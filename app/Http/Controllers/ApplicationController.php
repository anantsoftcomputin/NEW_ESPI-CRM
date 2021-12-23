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
use Illuminate\Http\Request;
use DataTables;
use Illuminate\Support\Facades\Mail;

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
            $data = Application::select('*')->with('University','Course','Enquiry','University.country');
            if(\Auth::user()->roles->pluck('name')->first()=="counsellor")
            {
                $data->where('added_by_id',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('admin/inquiry/FollowUp/'.$user->enquiry_id);
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = '<div><a href="'.route('Application.edit',$row->id).'" class="edit btn btn-primary btn-sm mb-1">Change Status</a>';
                        //    $btn .= ' <a href="'.route('Application.edit',$row->id).'" class="edit btn btn-dark btn-sm mb-1">Add Follow Up</a></div>';
                           $btn .='<a href="javascript:void(0);" onclick="add_follow_up('.$row->Enquiry->id.');" class="btn btn-dark btn-sm mb-1 show_follow_up">Add Follow Up</a>';
                            return $btn;
                    })
                    ->addColumn('date', function($model) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i:s');
                    })
                    ->rawColumns(['action'])
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
        return view('application.add',compact('enquiry','university','course','intake'));
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



        Application::create($validated);
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
        $status=array('Applied');
        if(strtolower($country)=="canada")
        {
            array_push($status,'Process');
            array_push($status,'IELTS & Academic');
            array_push($status,'Process In University');
            array_push($status,'Receive Offer');
            array_push($status,'Medical');
            array_push($status,'Open GIC A/C');
            array_push($status,'Fees Payment');
            array_push($status,'Visa Documents');
            array_push($status,'Visa Application');
        }
        elseif(strtolower($country)=="australia")
        {
            array_push($status,'IELTS + Academic');
            array_push($status,'Application For Admission');
            array_push($status,'Offer Letter');
            array_push($status,'GTE Preparation');
            array_push($status,'Interview Preparation');
            array_push($status,'Finance');
            array_push($status,'Fees Payment');
            array_push($status,'Medical');
            array_push($status,'Visa Lodgement Online Application');
            array_push($status,'Get Visa Stamping Or E-Visa');
        }
        elseif(strtolower($country)=="usa")
        {
            array_push($status,'Admission And I-20');
            array_push($status,'Visa Fees');
            array_push($status,'Service Fees');
            array_push($status,'Interview Appointment');
            array_push($status,'DS 160');
            array_push($status,'Interview Preparation');
            array_push($status,'Tuition Fees Payment');
        }
        elseif(strtolower($country)=="uk")
        {
            array_push($status,'Assessment For Course & University');
            array_push($status,'Application Process-University');
            array_push($status,'Interview Preparation');
            array_push($status,'Offer Letter');
            array_push($status,'Conditional Offer Letter');
            array_push($status,'Interview');
            array_push($status,'Unconditional Offer Letter');
            array_push($status,'Fees Payment');
            array_push($status,'Apply For Medical');
            array_push($status,'Fund Show');
            array_push($status,'Interview Preparation For CAS');
            array_push($status,'Submit Documents For CAS');
            array_push($status,'Cas Received');
            array_push($status,'Visa File Submission');
        }
        else
        {
            array_push($status,'Rejected');
        }
        $documents=ApplicationDocument::where('application_id',$Application->id)->get();
        return view('application.edit',compact('university','country','course','intact','status','Application','documents'));
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
            'remark' => 'required',
            'status' => 'required',
        ]);

        $application_list=Application::find($application);
        $application_list->status=$request->status;
        $application_list->remark=$request->remark;
        $application_list->save();
        EnqActivity("Update Status Application",$application_list->enquiry_id);
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
        $requirement=CourseRequirement::where('course_id',$Ass->course_id)->get();
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

            $Ass->status="apply";
            $Ass->save();
            //Mail::to($assessment->Enquiry->email)->send(new ReConformMailToStudent($assessment->Enquiry));
            $assment=assessment::find($Ass->id)->toArray();
            $assment['application_id']=$this->generateUniqueCode();
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






            EnqActivity("Apply Application",$Application->enquiry_id);
            return redirect(route('Application.index'))->with('success','Application');
        }


        return view('application.confirm',compact('Ass','requirement'));
    }

    public function QuickApplication(AddAssessment $request)
    {
        # code...
    }
}
