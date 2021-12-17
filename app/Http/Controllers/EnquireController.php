<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Requests\enquire\AddEnquireRequest;
use App\Http\Requests\enquire\EditEnquireRequest;
use Mail;
use App\Events\PushNotification;
use Event;
use Illuminate\Support\Facades\Log;
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

            $data = Enquiry::orderBy("updated_at","desc")->select('*')->with('City','State','Country','Counsellor');

            if(\Auth::user()->roles->pluck('name')->first()=="counsellor")
            {
                $data->where('counsellor_id',\Auth::user()->id);
            }
            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('api/admin/inquiry/FollowUp/'.$user->id);
                    })
                    ->addIndexColumn()
                    ->addColumn('date', function($model) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i:s');
                    })
                    ->addColumn('enq', function($row){
                        if($data=$this->existdetail($row->id))
                           {
                            return '<a href="'.route('detail.nav',$row->id).'" style="color:blue;" >'.$row->name.'</a>';
                           }
                           else
                           {
                            return $row->name;
                           }
                    })
                    ->addColumn('action', function($row){
                           $btn = "";
                           if($data=$this->existdetail($row->id))
                           {
                            $btn .='<a href="'.route('EnquiryDetail.Show',$row->id).'" class="assessment btn btn-success btn-sm mb-2">Show Detail Enquiry</a> ';
                            $btn .='<a href="'.route('Assessment.Add',$row->id).'" class="assessment btn btn-warning btn-sm mb-2">Add Assessment</a>';
                            // $btn .='<a href="'.route('detail.nav',['Enquire'=>$row->id,'Active'=>'8']).'" class="btn btn-success btn-sm mb-1">List Follow Up</a>';
                            $btn .='<a href="javascript:void(0);" onclick="add_follow_up('.$row->id.');" class="btn btn-dark btn-sm mb-1 show_follow_up">Add Follow Up</a>';
                           }
                           else
                           {
                               $btn .='<a href="'.route('EnquiryDetail.add',$row->id).'" class="assessment btn btn-info btn-sm mb-1">Add Detail Enquiry</a>';

                           }
                           return $btn;
                    })
                    ->rawColumns(['action','enq'])
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
        // $date="731101";
        // echo $newdate=date('Y-m-d',strtotime($date));
        // die;
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
        $validated['name']=$request->first_name .' '.$request->middle_name.' '.$request->last_name;
        $validated['dob']=date("Y-m-d",strtotime($request->dob));
        $validated['added_by_id'] = \Auth::user()->id;
        $validated["reference_source"]=$request->reference_source;
        $validated["reference_name"]=$request->reference_name;
        $validated["reference_phone"]=$request->reference_phone;
        $validated["reference_code"]=$request->reference_code;
        $validated["remarks"]=$request->remarks;
        $validated["passport_no"]=$request->passport_number;
        $validated["preferred_country"]=$request->preferred_country;
        $validated["first_name"]=$request->first_name;
        $validated["middle_name"]=$request->middle_name;
        $validated["last_name"]=$request->last_name;

        $enq=Enquiry::create($validated);
        //$enq=Enquiry::find(23);
        $admin=get_user(1);

        $counsellor=get_user($request->counsellor_id);
        $details = [
            'title' => 'New Enquires from '.$request->first_name,
            'url' => url('/admin/Enquires'),
            'enq_id' => $enq->id,
            'enquiry_detail' => $enq
            ];

        $NotificationBody="";
        if($admin)
        {
            if($admin->fcm_token)
            {
                Log::error("Send push to admin ");
                $adminFCMToken=[$admin->fcm_token];
            }

            Log::error("Send Mail to admin");
            Mail::to($admin->email)->send(new AddEnquiry($details));
        }

        if($counsellor)
        {
            Log::error("Send Mail to counsellor");
            Mail::to($counsellor->email)->send(new AddEnquiry($details));
        }

        if($counsellor->fcm_token)
        {
            $NotificationBody="New Enquiry Added By ".\Auth::user()->name;
            Event::dispatch(new PushNotification($counsellor->id,'Assign New Enquiry',$NotificationBody));
        }

        if($admin->fcm_token)
        {
            $NotificationBody="New Enquiry Added By ".\Auth::user()->name;
            Event::dispatch(new PushNotification($admin->id,'New Enquiry Generate',$NotificationBody));
        }

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
        $validated['name']=$request->first_name .' '.$request->middle_name.' '.$request->last_name;
        $validated['company_id']=\Auth::user()->company_id;
        $validated['dob']=date("Y-m-d",strtotime($request->dob));
        $validated['added_by_id'] = \Auth::user()->id;
        $validated["reference_source"]=$request->reference_source;
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
        $enquiry=Enquiry::where("otp","=",$request->otp)->where("id",$request->id)->first();
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

    public function sendNotification($enq,$fcm_token,$message)
    {
        Event::dispatch(new PushNotification(\Auth::user()->id,$message,"This is body"));
        //$firebaseToken = User::whereNotNull('fcm_token')->where("id",$enquiry->counsellor_id)->pluck('fcm_token')->all();
        // $SERVER_API_KEY = 'AAAAQ--KII4:APA91bHbcNhWF8qnsOkAiVnDCcSBv2d8YxzBavbRCWIpZIoU00RDldZM61Wn72ycqs_qTtBMNB5yhmpQ2BO8B9W-Mx2TC4WXqoe7Qnc8FziJSe9zgkmN2R_4CPHKMSce4N2WAUJ5Bo3X';

        // $data = [
        //     "registration_ids" => $fcm_token, // for multiple device id
        //     "notification" => [
        //         "title" => "New Enquiry Generate",
        //         "body" =>"Enquiry Added By ".\Auth::user()->name,
        //     ],
        // ];

        // $dataString = json_encode($data);

        // $headers = [
        //     'Authorization: key=' . $SERVER_API_KEY,
        //     'Content-Type: application/json',
        // ];

        // $ch = curl_init();

        // curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        // curl_setopt($ch, CURLOPT_POST, true);
        // curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        // $response = curl_exec($ch);

        // curl_close($ch);
        // $response;

        return redirect()->route("Enquires.index")->with('success_msg',$enq->enquiry_id);
    }
}
