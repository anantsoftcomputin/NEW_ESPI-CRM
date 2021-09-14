<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Requests\enquire\AddEnquireRequest;
use App\Http\Requests\enquire\EditEnquireRequest;
use Mail;
use DataTables;
use App\Models\EnquiryDetail;
use App\Mail\AddEnquiry;
use App\Models\User;
use App\Mail\EnquiryOtpMailsendWhenImport;
use Auth;
use App\Models\University;
use App\Models\Course;
use App\Models\Intact;
use App\Models\assessment;

class EnquireController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:view-enquiry');
        // $this->middleware('permission:create-enquiry', ['only' => ['create','store','sendOtp']]);
        // $this->middleware('permission:update-enquiry', ['only' => ['edit','update']]);
        // $this->middleware('permission:destroy-enquiry', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Enquiry::orderBy("updated_at","desc")->select('*')->with('City','State','Country');

            if(\Auth::user()->roles->pluck('name')=="Counsellor")
            {
                $data->where('counsellor_id',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('api/admin/inquiry/'.$user->id);
                    })
                    ->addIndexColumn()
                    ->addColumn('action', function($row){
                           $btn = "";
                           if($this->existdetail($row->id))
                           {
                            $btn .='<a href="'.route('Assessment.Add',$row->id).'" class="assessment btn btn-warning btn-sm">Add Assessment</a>';
                           }
                           else
                           {
                               $btn .='<a href="'.route('EnquiryDetail.add',$row->id).'" class="assessment btn btn-info btn-sm">Add Detail Enquiry</a>';
                           }
                           return $btn;
                    })
                    ->rawColumns(['action'])
                    ->make(true);
        }
        return view('enquiry.index');
    }

    public function existdetail($id)
    {
        return EnquiryDetail::where('enquiry_id',"=",$id)->first();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user=User::role('Counsellor')->get();

        $university=University::all();
        $course=Course::all();
        $intake=Intact::all();
        $page="Enquiry";
        $title="Add New Enquiry";
        //$user=User::where('company_id','1')->whereNotIn('id',[\Auth::user()->id])->get();
        return view('enquiry.add',compact('user','university','course','intake','page','title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AddEnquireRequest $request)
    {
        $validated = $request->validated();
        $validated['enquiry_id'] ="ESPI_".$this->generateUniqueCode();
        $validated['name']=$request->first_name .' '.$request->last_name;
        $validated['dob']=date("Y-m-d",strtotime($request->dob));
        $validated['added_by_id'] = \Auth::user()->id;
        $validated["reference_source"]=$request->reference_source;
        $validated["reference_name"]=$request->reference_name;
        $validated["reference_phone"]=$request->reference_phone;
        $validated["reference_code"]=$request->reference_code;
        $validated["remarks"]=$request->remarks;
        $validated["preferred_country"]=$request->preferred_country;
        $enq=Enquiry::create($validated);
        
        if(isset($request->generalassessment))
        {
            $assessment=new assessment();
            $assessment->enquiry_id=$enq->id;
            $assessment->university_id=$request->university_id;
            $assessment->course_id=$request->course_id;
            $assessment->intact_year_id=$request->intact_year_id;
            $assessment->intact_month_id=$request->intact_month_id;
            $assessment->added_by_id=\Auth::user()->id;
            $assessment->company_id=\Auth::user()->company_id;
            $assessment->assign_id=$request->counsellor_id;
            $assessment->status=$request->status;
            $assessment->save();
        }
        
        $details = [
                'title' => 'New Enquires from '.$request->name,
                'url' => url('/login'),
                'enq_id' => $enq->id
            ];
        //Mail::to($request->email)->send(new AddEnquiry($details));
        return redirect()->route("Enquires.index")->with('success_msg',$enq->enquiry_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function show(Enquiri $enquiri)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function edit($enquiri)
    {
        $user=User::role('Counsellor')->get();
        $university=University::all();
        $course=Course::all();
        $intake=Intact::all();
        $page="Enquiry";
        $title="Update Enquiry";
        $enquiry=Enquiry::find($enquiri);
        return view('enquiry.edit',compact('user','university','course','intake','page','title','enquiry'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$enquiry)
    {
        $validated =request()->except(['_token','_method']);
        $validated['company_id']=\Auth::user()->company_id;
        $validated['dob']=date("Y-m-d",strtotime($request->dob));
        $validated['added_by_id'] = \Auth::user()->id;
        $validated["referance_source"]=$request->referance_source;
        $validated["reference_name"]=$request->reference_name;
        $validated["reference_phone"]=$request->reference_phone;
        $validated["reference_code"]=$request->reference_code;
        $validated["remarks"]=$request->remarks;
        $validated["preferred_country"]=$request->preferred_country;
        $enquiry=Enquiry::where("id",$enquiry)->update($validated);
        $enq=Enquiry::find($enquiry);
       
        return view('success',compact('enq'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquiri  $enquiri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Enquiri $enquiri)
    {
        //
    }

    public function sendOtp(Request $request)
    {
        dd($request->email);
    }

    public function checkEmail(Request $request)
    {
        $check=Enquiry::where("email",$request->email)->first();
        if($check){
            return $check;
        }
    }

    public function getEnquiryByEmail(Request $request)
    {
        return Enquiry::where("email",$request->email)->first();
    }

    public function enquiryOtpSend($id)
    {
        $otp= rand(100000, 999999);

        $enquiry=Enquiry::find($id);
        $enquiry->otp=$otp;
        $enquiry->save();
        
        $company=get_company_by_id($enquiry->company_id);
        $branch=$company->name ?? "";
        $details = [
                'otp' => 'Your OTP '.$otp,
                'enq_id' => $enquiry->id,
                'url' => url('/login'),
                "Branch"=>$branch,
            ];
            
        Mail::to($enquiry->email)->send(new EnquiryOtpMailsendWhenImport($details));

        return view("enquiry.verifyOtp",compact("otp","enquiry","branch"));
    }

    function verify_otp(Request $request)
    {
        $enquiry=Enquiry::where("otp","=",$request->otp)
        ->where("id",$request->id)->first();
        if($enquiry)
        {
            return redirect()->route('Enquires.edit',$enquiry->id);
            //$this->edit($enquiry->id);
        }else{
            return back()->with("error","Invalid OTP");
        }
    }

    public function generateUniqueCode()
    {
        do {
            $code = random_int(10000000, 99999999);
        } while (Enquiry::where("enquiry_id", "=", $code)->first());
        return $code;
    }
}
