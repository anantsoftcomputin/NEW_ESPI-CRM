<?php

namespace App\Http\Controllers;

use App\Http\Requests\Application\AddApplication;
use App\Http\Requests\Assessment\AddAssessment;
use App\Mail\ReConformMailToStudent;
use App\Models\Application;
use App\Models\ApplicationDocument;
use App\Models\assessment;
use App\Models\Course;
use App\Models\CourseRequirement;
use App\Models\Enquiry;
use App\Models\Intact;
use App\Models\University;
use App\Models\ApplicationStatus;
use App\Models\ApplicationRemark;
use App\Models\EnquiryDetail;
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Mail;
use SebastianBergmann\Environment\Console;

class ApplicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function __construct()
    // {
    //     $this->middleware('permission:view-application');
    //     $this->middleware('permission:create-application', ['only' => ['create','store']]);
    //     $this->middleware('permission:update-application', ['only' => ['edit','update']]);
    //     $this->middleware('permission:destroy-application', ['only' => ['destroy']]);
    // }

    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Application::select('applications.*')->with('University','Course','Enquiry','University.country','LastFollowUp');

            if(\Auth::user()->roles->pluck('name')->first()=="counsellor")
            {
                $data->where('applications.added_by_id',\Auth::user()->id);
            }

            if(\Auth::user()->roles->pluck('name')->first()=="Processor")
            {
                $data->where('applications.processor_id',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('admin/Application/ApplicationFollowUp/'.$user->id);
                    })
                    ->addColumn('processor_id', function($user) {
                        return \App\Models\User::find($user->processor_id)->name ?? '<span class="badge badge-pill badge-danger">Not Set Yet</span>';
                    })
                    ->addColumn('detail_enquiry', function (Application $application) {
                        return $application->Enquiry->name;
                    })
                    ->addColumn('university_detail', function(Application $application) {
                        return $application->University->name;
                    })
                    ->addColumn('course_detail', function(Application $application) {
                        return $application->Course->name;
                    })
                    ->addColumn('country_detail', function(Application $application) {
                        return $application->University->Country->name;
                    })
                    ->addColumn('agent_detail', function($date) {
                        $colum_row="";
                        if($date->Enquiry->reference_code)
                        {
                            $agent_name=$date->Enquiry->reference_name ?? "Not Set Yet";
                            $colum_row.='<span class="badge badge-pill badge-info bs-tooltip" title="'.$date->Enquiry->reference_name.'">#';
                            $colum_row.=$date->Enquiry->reference_code;
                        }
                        else
                        {
                            $colum_row.='<span class="badge badge-pill badge-warning" style="text-transform:uppercase;">#';
                            $colum_row.=get_company_by_id($date->Enquiry->company_id)->name;
                        }
                        return $colum_row."</span>";
                    })
                    ->addColumn('last_follow_up', function($date) {
                        $data_status=$date->LastFollowUp->pluck('status')->toArray();
                        if(count($data_status)>0)
                            return $data_status[count($data_status)-1];
                        else
                            return " ";
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                        $btn="";
                        if(\Auth::user()->roles->pluck('name')->first()=="Processor" || \Auth::user()->roles->pluck('name')->first()=="super-admin" ||  \Auth::user()->roles->pluck('name')->first()=="Admin")
                        {
                            $btn = '<div><a href="'.route('Application.edit',$row->id).'" class="edit btn btn-primary btn-sm mb-1">Change Status</a>';
                        }
                        // $btn .= ' <a href="'.route('Application.edit',$row->id).'" class="edit btn btn-dark btn-sm mb-1">Add Follow Up</a></div>';
                        if(\Auth::user()->roles->pluck('name')->first()=="counsellor" || \Auth::user()->roles->pluck('name')->first()=="super-admin" || \Auth::user()->roles->pluck('name')->first()=="Admin")
                        {
                            $btn .='<a href="javascript:void(0);" onclick="add_follow_up('.$row->id.');" class="btn btn-dark btn-sm mb-1 show_follow_up">Add Follow Up</a>';
                        }
                            return $btn;
                    })
                    ->addColumn('date', function(Application $application) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $application->created_at)->format('d/m/Y H:i:s');
                    })
                    ->rawColumns(['action','processor_id','agent_detail','last_follow_up','detail_enquiry'])
                    ->make(true);
        }
        return view('application.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($enquiry)
    {
        $university=University::all();
        $course=Course::all();
        $intake=Intact::all();
        $processor=\App\Models\User::role('Processor')->where('company_id',\Auth::user()->company_id)->get();
        return view('application.add',compact('enquiry','university','course','intake','processor'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddApplication $AddApplication)
    {
        $validated = $AddApplication->validated();
        $validated['application_id'] ="ESPI_".$this->generateUniqueCode();
        $validated['added_by_id'] = \Auth::user()->id;
        $validated['status'] = 'Applied';

        // applied

        $application=Application::create($validated);
        $enquiry=Enquiry::find($application->enquiry_id);
        $enquiry->status="applied";
        $enquiry->save();
        // enquiry_id
        return redirect(route('Application.index'))->with('success','Application created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($application)
    {
        $Application=Application::findOrFail($application);

        $course=Course::find($Application->course_id);
        $university=University::find($Application->university_id);
        $intact=Intact::find($Application->intact_month_id);
        $country=$university->Country->name;
        // dd($university->country_id);

        $status=ApplicationStatus::where('countries_id',$university->country_id)->where('visibility','1')->get();
        $documents=ApplicationDocument::where('application_id',$Application->id)->get();
        $processor=\App\Models\User::role('Processor')->get();
        $remarkRow=ApplicationRemark::where('application_id',$Application->id)->get();
        $remark=array();
        foreach($remarkRow as $remarkloop)
        {
            $this_data=$remarkloop->toArray();
            // $this_data['id']=$remarkloop->id;
            // $this_data['remark']=$remarkloop->remark;
            $this_data['user']=$remarkloop->user->name;
            $this_data['start_date']=$remarkloop->start_date;
            $this_data['date']=$remarkloop->created_at->format('d-m-y');
            // $this_data['row']=$remarkloop->toArray();
            $remark[$remarkloop->status_id]=$this_data;


        }
        //dd($remark);
        //remarksFollowUp
        //dd($Application->FollowUp);
        // dd(count($status));
        // dd(count($remarkRow));
        $pending=$process=0;
        $CalculateRemarkRow=ApplicationRemark::where('application_id',$Application->id)->where('completed_date',"!=",NULL)->get();
        if(count($CalculateRemarkRow)>0)
        {
            $process=count($CalculateRemarkRow)/count($status)*100;
        }

        $CalculateRemarkpending=ApplicationRemark::where('application_id',$Application->id)->get();
        // dd($CalculateRemarkpending);
        if(count($CalculateRemarkpending)>0)
        {
            $pending=(count($CalculateRemarkpending)-count($CalculateRemarkRow))/count($status)*100;
        }

        return view('application.edit',compact('university','country','course','intact','status','Application','documents','processor','remark','process','pending'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$application)
    {
        $request->validate([
            'associated_with' => 'required',
            'processor_id' => 'required',
        ]);

        $application_list=Application::find($application);
        $application_list->associated_with=$request->associated_with;
        if($application_list->processor_id!="")
        {
            $application_list->processor_id=$request->processor_id;
        }
        $application_list->save();
        EnqActivity("Update Status Application.Associated With:".$request->associated_with,$application_list->enquiry_id);
        return redirect(route('Application.index'))->with('success','Application status change successfully!');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }

    public function detailFromEnq($enq,Request $request)
    {
        if ($request->ajax()) {
            $data = Application::select('*')->where('enquiry_id', $enq)->with('University','Course');
            return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<a href="'.route('Application.edit',$row->id).'" class="edit btn btn-primary btn-sm">Change Status</a>';
                            return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Application::where("application_id", "=", $code)->first());
        return $code;
    }

    public function ApplyApplication($Ass,Request $request)
    {
        $Ass=assessment::find($Ass);
        $enquiry=Enquiry::find($Ass->enquiry_id);
        $enquiry->status="applied";
        $enquiry->save();
        $requirement=CourseRequirement::where('course_id',$Ass->course_id)->get();
        $Detail=EnquiryDetail::where('enquiry_id',$Ass->enquiry_id)->first();
        if($Detail->is_conform==0)
        {
            return redirect()->back()->withError("Need verify student details then you can apply.");
        }
        if($request->isMethod('post'))
        {

            $request_role=array();
            foreach($requirement as $req)
            {
                $request_role[$req->documents]='required';
            }
            if(empty(!count($request_role)))
            {
                $validated = $request->validate($request_role);
            }

            $Ass->status="Applied";
            $Ass->save();
            //Mail::to($assessment->Enquiry->email)->send(new ReConformMailToStudent($assessment->Enquiry));
            $assment=assessment::find($Ass->id)->toArray();
            $assment['application_id']=$this->generateUniqueCode();
            $assment['processor_id']=$request->processor_id;
            $Application=Application::create($assment);

            foreach($requirement as $application_document)
            {

                $document=New ApplicationDocument();
                $document->name=$application_document->documents;
                $document->company_id=\Auth::user()->company_id;
                $document->added_by=\Auth::user()->id;
                $document->application_id=$Application->id;
                $path = $request->file($application_document->documents)->store(
                    "enquiry/".$request->enquiry.'/application/'.$Application->id, 'public'
                );
                $document->file_name="storage/".$path;
                $document->status='draft';
                $file = $request->file($application_document->documents);
                $document->type=$file->getClientOriginalExtension();
                $document->save();
            }

            EnqActivity("Send Application To Processor. | Application : ".$Application->application_id ,$Application->enquiry_id);
            return redirect(route('Application.index'))->with('success','Application');
        }

        $processor=\App\Models\User::role('Processor')->get();
        return view('application.confirm',compact('Ass','requirement','processor'));
    }

    public function QuickApplication(AddAssessment $request)
    {
        # code...
    }

    public function ApplicationStatusRemark(Request $request,$application_id)
    {
        $request->validate([
            'remark' => 'required'
        ]);
        $ApplicationRemark=ApplicationRemark::where('application_id',$application_id)->where('status_id',$request->status_id)->first();
        if(isset($ApplicationRemark))
        {
            $ApplicationRemark->remark=$request->remark ?? "-";
            // $ApplicationRemark->application_id=$application_id;
            // $ApplicationRemark->status_id=$request->status_id;
            $ApplicationRemark->is_not_applicable=$request->is_not_applicable;
            $ApplicationRemark->completed_date=date('Y-m-d');
            $ApplicationRemark->user_id=\Auth::user()->id;
            $ApplicationRemark->company_id=\Auth::user()->company_id;
            $ApplicationRemark->save();
            //EnqActivity("Done Application. Status :".$request->status_id,$Application->enquiry_id);
            $Application=Application::find($application_id);
            $status_name=ApplicationStatus::find($request->status_id)->status;
            EnqActivity("Complied Process on Application Status. | Application : ".$Application->application_id." | Status : ".$status_name,$Application->Enquiry->id);
        }
        else
        {
            $newStatus=new ApplicationRemark();
            $newStatus->remark=$request->remark;
            $newStatus->application_id=$application_id;
            $newStatus->status_id=$request->status_id;
            $newStatus->is_not_applicable=$request->is_not_applicable;
            $newStatus->completed_date=date('Y-m-d');
            $newStatus->user_id=\Auth::user()->id;
            $newStatus->company_id=\Auth::user()->company_id;
            $newStatus->save();
            $Application=Application::find($application_id);
            $status_name=ApplicationStatus::find($request->status_id)->status;
            EnqActivity("Complied Process on Application Status. | Application : ".$Application->application_id." | Status : ".$status_name,$Application->Enquiry->id);
           // EnqActivity("Process Application. Status :".$status_id,$Application->enquiry_id);
        }
        return redirect()->route('Application.edit',['Application'=>$application_id])->withInfo("Added Remark successfully.");
    }


    public function StartWorkStatus(Request $request,$application_id,$status_id)
    {
        $ApplicationRemark=new ApplicationRemark();
        $ApplicationRemark->application_id=$application_id;
        $ApplicationRemark->status_id=$status_id;
        $ApplicationRemark->start_date=date('Y-m-d');
        $ApplicationRemark->user_id=\Auth::user()->id;
        $ApplicationRemark->company_id=\Auth::user()->company_id;
        $ApplicationRemark->save();

        $Application=Application::find($application_id);
        $status_name=ApplicationStatus::find($status_id)->status;
        EnqActivity("Process on Application Status. | Application : ".$Application->application_id." | Status : ".$status_name,$Application->Enquiry->id);
        // EnqActivity("Process Application. Status :".$status_id,\App\Models\Application::find('application_id')->Enquiry->id);
        return redirect()->route('Application.edit',['Application'=>$application_id])->withInfo("Start Work on Remark successfully.");
    }

    
}
