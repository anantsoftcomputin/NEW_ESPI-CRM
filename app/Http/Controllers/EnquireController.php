<?php

namespace App\Http\Controllers;

use App\Models\Enquiry;
use Illuminate\Http\Request;
use App\Http\Requests\enquire\AddEnquireRequest;
use App\Http\Requests\enquire\EditEnquireRequest;
use Mail;
use App\Events\PushNotification;
use App\Jobs\WelcomeEmailJob;
use Event;
use Illuminate\Support\Facades\Log;
use DataTables;
use App\Models\EnquiryDetail;
use App\Mail\AddEnquiry;
use App\Models\User;
use App\Mail\EnquiryOtpMailsendWhenImport;
use App\Mail\WelcomMail;
use Auth;
use App\Models\Card;
use App\Models\University;
use App\Models\Course;
use App\Models\Intact;
use App\Models\TransactionCredit;
use App\Models\Package;
use App\Models\assessment;
use App\Models\AssignCounsellor;
use Illuminate\Auth\Events\Failed;

class EnquireController extends Controller
{
    public function __construct()
    {
        // $this->middleware('permission:create-enquiry');
        $this->middleware('permission:create-enquiry', ['only' => ['create','store','sendOtp']]);
        $this->middleware('permission:update-enquiry', ['only' => ['edit','update']]);
        $this->middleware('permission:coaching-lead', ['only' => ['Coaching']]);
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

            $data = Enquiry::orderBy("updated_at","desc")->select('*')->with('City','State','Country','Counsellor')->where('status','!=','Failed');

            if(in_array("counsellor",\Auth::user()->roles->pluck('name')->toArray()))
            {
                $data->whereIn('id',AssignCounsellor::where('counsellors_id',\Auth::user()->id)->pluck('enquiry_id'));
            }
            else
            {
                $data->where('status','!=','Coaching');
            }

            return Datatables::of($data)
                    ->addColumn('details_url', function($enq) {
                        return url("admin/inquiry/FollowUp/".$enq->id);
                    })
                    ->addColumn('counsellor_name', function($user) {
                        $user_names="";
                        foreach($user->Counsellor as $users)
                        {
                            $user_names.='<a href="#" class="badge badge-info">'.$users->Detail->name.'</a> ';
                        }
                        return $user_names ?? '<a href="#" class="badge badge-success">Not Assign Yet</a>';
                    })
                    ->addColumn('is_enrolled', function($user) {
                        $transition=\App\Models\Transaction::where('enquiry_id',$user->id)->get();
                        $transition_label="";
                        if(count($transition)>0)
                        {
                            foreach($transition as $tr)
                            {
                                // if($tr->title=="Enrolled")
                                // {
                                //     $transition_label.='<a href="#" class="badge badge-success mb-2">';
                                //     $transition_label.="Enr ".$tr->created_at->format('d-m-Y');
                                //     $transition_label.="Enr ".$tr->created_at->format('d-m-Y');
                                //     $transition_label.='</a>';

                                // }
                                $stringtoarray=explode(" ",$tr->title);
                                $transition_label.='<a href="#" class="badge badge-success mb-2 mr-1 bs-tooltip" title="'.$tr->title.'">';
                                $transition_label.=strtoupper(substr($stringtoarray[0], 0, 1));
                                if(isset($stringtoarray[1]))
                                {
                                    $transition_label.=strtoupper(substr($stringtoarray[1], 0, 4));
                                }
                                $transition_label.=" ".$tr->created_at->format('d-m-Y');
                                $transition_label.='</a>';
                            }
                            return $transition_label;
                            //return '<a href="#" class="badge badge-success">Yes</a>';
                        }
                        $transition_label.='<a href="#" class="badge badge-danger">No</a>';
                        return $transition_label;
                    })
                    ->addIndexColumn()
                    ->addColumn('date', function($model) {
                        return \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $model->created_at)->format('d/m/Y H:i:s');
                    })
                    ->addColumn('enq', function($row){
                        $icon='<svg style="width: 17px; height: 17px; vertical-align: text-top; color: #1abc9c; fill: #ddf5f0; stroke-width: 0.5px;" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg> ';
                        $date="<br> ".$icon.\Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->format('d/m/Y');
                        if($data=$this->existdetail($row->id))
                           {
                            return '<a href="'.route('detail.nav',$row->id).'" style="color:blue;" >'.$row->name.'</a>'.$date;
                           }
                           else
                           {
                            return $row->name.$date;
                           }
                    })
                    ->addColumn('action', function($row){
                           $btn = "";

                           $btn .='<a href="javascript:void(0);" onclick="add_transactions('.$row->id.');" style="background:#34495e;" class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="Add Payment"><?xml version="1.0" encoding="UTF-8" standalone="no"?><svg xmlns:inkscape="http://www.inkscape.org/namespaces/inkscape" xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#" xmlns="http://www.w3.org/2000/svg" xmlns:cc="http://creativecommons.org/ns#" xmlns:dc="http://purl.org/dc/elements/1.1/" xmlns:sodipodi="http://sodipodi.sourceforge.net/DTD/sodipodi-0.dtd" xmlns:svg="http://www.w3.org/2000/svg" xmlns:ns1="http://sozi.baierouge.fr" xmlns:xlink="http://www.w3.org/1999/xlink" id="svg3611" sodipodi:docname="Indian_Rupee_symbol.svg" viewBox="0 0 169.76 250.39" version="1.1" inkscape:version="0.47 r22583" > <sodipodi:namedview id="base" bordercolor="#666666" inkscape:pageshadow="2" inkscape:window-y="-4" pagecolor="#ffffff" inkscape:window-height="712" inkscape:window-maximized="1" inkscape:zoom="5.3091607" inkscape:window-x="-4" showgrid="false" borderopacity="1.0" inkscape:current-layer="layer1" inkscape:cx="94.062924" inkscape:cy="212.24797" inkscape:window-width="1280" inkscape:pageopacity="0.0" inkscape:document-units="px"/> <g id="layer1" inkscape:label="Layer 1" inkscape:groupmode="layer" transform="translate(0 -801.97)" > <path id="path4158" sodipodi:nodetypes="cccccccccccccccccccc" style="stroke:#fff;stroke-width:.099084;fill:#fff" d="m99.017 1052.3-90.577-113.33 0.5232-22.46c42.51 2.93 75.559-1.57 83.248-41.78l-90.578-0.52 14.66-24.55 72.253 1.04c-11.009-22.88-41.286-25.7-88.484-24.02l16.231-24.03 153.41-0.22927-15.184 23.731h-42.409c7.7512 8.1823 13.424 17.597 13.613 25.591l43.98-0.52226-15.184 23.502-29.32 0.52229c-4.5772 35.058-36.787 55.815-77.489 60.584l91.184 116.44-39.874 0.022v0.0004z"/> </g > <metadata > <rdf:RDF > <cc:Work > <dc:format >image/svg+xml</dc:format > <dc:type rdf:resource="http://purl.org/dc/dcmitype/StillImage"/> <cc:license rdf:resource="http://creativecommons.org/licenses/publicdomain/"/> <dc:publisher > <cc:Agent rdf:about="http://openclipart.org/" > <dc:title >Openclipart</dc:title > </cc:Agent > </dc:publisher > <dc:title >Indian Rupee Symbol</dc:title > <dc:date >2010-07-23T08:59:26</dc:date > <dc:description >The clipart was generated as draft based on the Symbol of Indian Rupee approved by the Union Cabinet on 15 July 2010. The Design for the symbol was submitted by D Udaya Kumar.&#13;\nSource :http://pib.nic.in/archieve/others/2010/jul/d2010071501.pdf</dc:description > <dc:source >https://openclipart.org/detail/74431/indian-rupee-symbol-by-netalloy</dc:source > <dc:creator > <cc:Agent > <dc:title >netalloy</dc:title > </cc:Agent > </dc:creator > <dc:subject > <rdf:Bag > <rdf:li >Indian Rupee Symbol</rdf:li > </rdf:Bag > </dc:subject > </cc:Work > <cc:License rdf:about="http://creativecommons.org/licenses/publicdomain/" > <cc:permits rdf:resource="http://creativecommons.org/ns#Reproduction"/> <cc:permits rdf:resource="http://creativecommons.org/ns#Distribution"/> <cc:permits rdf:resource="http://creativecommons.org/ns#DerivativeWorks"/> </cc:License > </rdf:RDF > </metadata ></svg></a>';

                           $btn .='<a href="javascript:void(0);" data-toggle="modal" data-target="#add_card_transactions" onclick="add_card_transactions('.$row->id.');" style="background:#34495e;fill:white;" class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="Add Credit Card Payment"><?xml version="1.0" encoding="UTF-8" standalone="no"?>
                           <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                             width="55.667px" height="55.667px" viewBox="0 0 55.667 55.667" style="enable-background:new 0 0 55.667 55.667;" xml:space="preserve">
                           <g><g><g><path d="M52.667,12.333H3c-1.657,0-3,1.007-3,2.25c0,0,0,0.504,0,1.125s1.343,1.125,3,1.125h49.667c1.657,0,3-0.503,3-1.124c0-0.331,0-0.716,0-1.126C55.667,13.34,54.324,12.333,52.667,12.333z"/>
                           </g></g><path d="M0,26.5v13.833c0,1.657,1.343,3,3,3h49.667c1.657,0,3-1.343,3-3V26.5c0-1.657-1.343-3-3-3H3C1.343,23.5,0,24.843,0,26.5z
                           M16.708,32h-13c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h13c0.829,0,1.5,0.671,1.5,1.5C18.208,31.329,17.537,32,16.708,32z
                            M34.375,32h-13c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h13c0.829,0,1.5,0.671,1.5,1.5C35.875,31.329,35.204,32,34.375,32z
                            M48.875,40.167h-6.167c-1.657,0-3-1.157-3-2.583s1.343-2.583,3-2.583h6.167c1.657,0,3,1.157,3,2.583S50.532,40.167,48.875,40.167z
                            M52.041,32h-13c-0.829,0-1.5-0.671-1.5-1.5s0.671-1.5,1.5-1.5h13c0.829,0,1.5,0.671,1.5,1.5C53.541,31.329,52.87,32,52.041,32z"/>
                           </g>
                           </svg>
                           </a>';

                           if($data=$this->existdetail($row->id))
                           {
                            if(Auth::user()->hasPermissionTo('update-enquiry'))
                            {
                                $btn .='<a href="'.route('Enquires.edit',$row->id).'" style="background: #9b59b6; color: #fff;" class="assessment btn rounded-circle mb-2 mr-1 bs-tooltip" title="Edit Enquiry"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>';
                            }
                            $btn .='<a href="'.route('EnquiryDetail.Show',$row->id).'" class="assessment btn btn-success rounded-circle mb-2 mr-1 bs-tooltip" title="Show Enquiry Detail"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-text"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="16" y1="13" x2="8" y2="13"></line><line x1="16" y1="17" x2="8" y2="17"></line><polyline points="10 9 9 9 8 9"></polyline></svg></a>';

                            $btn .='<a href="'.route('Assessment.Add',$row->id).'" class="assessment btn btn-warning rounded-circle mb-2 mr-1 bs-tooltip" title="Add Assessment"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg></a>';
                            // $btn .='<a href="'.route('detail.nav',['Enquire'=>$row->id,'Active'=>'8']).'" class="btn btn-success rounded-circle mb-1">List Follow Up</a>';
                            $btn .='<a href="javascript:void(0);" onclick="add_follow_up('.$row->id.');" class="btn btn-dark rounded-circle mb-2 mr-1 show_follow_up bs-tooltip" title="Add Follow Up"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-git-merge"><circle cx="18" cy="18" r="3"></circle><circle cx="6" cy="6" r="3"></circle><path d="M6 21V9a9 9 0 0 0 9 9"></path></svg></a>';
                           }
                           else
                           {
                               $btn .='<a href="'.route('EnquiryDetail.add',$row->id).'" class="assessment btn btn-info rounded-circle mb-2 mr-1 bs-tooltip" title="Add Detail Enquiry"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-file-plus"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8z"></path><polyline points="14 2 14 8 20 8"></polyline><line x1="12" y1="18" x2="12" y2="12"></line><line x1="9" y1="15" x2="15" y2="15"></line></svg></a>';

                           }
                            $href="areyousure('".route('Enquires.ChangeStatus',['Enquire'=>$row->id,'Status'=>'Failed'])."');";
                           $btn .='<a href="javascript:void(0);" onclick="'.$href.'" class="btn btn-danger rounded-circle mb-2 mr-1 bs-tooltip failed_lead" title="Failed Enquiry"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-slash"><circle cx="12" cy="12" r="10"></circle><line x1="4.93" y1="4.93" x2="19.07" y2="19.07"></line></svg></a>';
                           return $btn;
                    })
                    ->rawColumns(['action','enq','counsellor_name','is_enrolled'])
                    ->make(true);
        }
        $Transaction= TransactionCredit::all();
        $Package= Package::all();

        // print_r($Transaction);
        // return view('enquiry.index', compact('Transaction'));
        return view('enquiry.index ',compact('Transaction','Package'));
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
        $user=User::role('Counsellor')->where('company_id',\Auth::user()->company_id)->get();

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
        $validated["alternate"]=$request->alternate;
        if($request->coaching=='yes')
        {
            $validated["status"]='coaching';
        }
        unset($validated['counsellor_id']);

        $enq=Enquiry::create($validated);
        $assigncounsellor=new AssignCounsellor();
        $assigncounsellor->enquiry_id=$enq->id;
        $assigncounsellor->counsellors_id=$request->counsellor_id;
        $assigncounsellor->added_by=\Auth::user()->id;
        $assigncounsellor->save();
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

        dispatch(new WelcomeEmailJob($enq));

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
        $validated["reference_source"]=$request->reference_source;
        $validated["reference_name"]=$request->reference_name;
        $validated["reference_phone"]=$request->reference_phone;
        $validated["reference_code"]=$request->reference_code;
        $validated["passport_no"]=$request->passport_number;
        $validated["remarks"]=$request->remarks;
        $validated["preferred_country"]=$request->preferred_country;
        $validated["first_name"]=$request->first_name;
        $validated["middle_name"]=$request->middle_name;
        $validated["last_name"]=$request->last_name;
        $validated["alternate"]=$request->alternate;
        if($request->coaching=='yes')
        {
            $validated["status"]='coaching';
        }
        unset($validated['coaching']);
        $enquiry=Enquiry::where("id",$enquiry)->update($validated);
        $enq=Enquiry::find($enquiry);

        return redirect()->route('Enquires.index')->withInfo("SuccessFully Updated Enquiry.");
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

    public function SendEnquire($Enq,Request $request)
    {
        if(\Auth::user()->id!='1')
        {
            AssignCounsellor::where('enquiry_id',$Enq)->where('counsellors_id',\Auth::user()->id)->delete();
        }

        $AssignCounsellor=AssignCounsellor::firstOrNew(['counsellors_id'=>$request->counsellor_id,'enquiry_id'=>$Enq]);
        $AssignCounsellor->added_by=\Auth::user()->id;
        $AssignCounsellor->save();

        return redirect(route('Enquires.index'))->withSuccess('Move Enquiry.');
    }

    public function CopyEnquire($Enq,Request $request)
    {
        // $Enquiry=Enquiry::find($Enq);
        // $Enquiry->counsellor_id=$request->counsellor_id;
        // $Enquiry->save();
        $AssignCounsellor=AssignCounsellor::firstOrNew(['counsellors_id'=>$request->counsellor_id,'enquiry_id'=>$Enq]);
        $AssignCounsellor->added_by=\Auth::user()->id;
        $AssignCounsellor->save();
        return redirect(route('Enquires.index'))->withSuccess('Copy Enquiry.');
    }

    public function Coaching(Request $request)
    {
        if ($request->ajax()) {

            $data = Enquiry::orderBy("updated_at","desc")->select('*')->with('City','State','Country','Counsellor')->where('status','Coaching');

            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('admin/inquiry/FollowUp/'.$user->id);
                    })
                    ->addColumn('counsellor_name', function($user) {
                        $user_names="";
                        foreach($user->Counsellor as $users)
                        {
                            $user_names.='<a href="#" class="badge badge-info">'.$users->Detail->name.'</a> ';
                        }
                        return $user_names ?? '<a href="#" class="badge badge-success">Not Assign Yet</a>';
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
                           $btn .='<a href="javascript:void(0);" onclick="add_follow_up('.$row->id.');" class="btn btn-dark btn-sm mb-1 show_follow_up">Add Follow Up</a>';
                           $btn .='<a href="'.route('Enquires.ChangeStatus',['Enquire'=>$row->id,'Status'=>'Failed']).'" class="btn btn-danger btn-sm mb-1">Failed Enquiry</a>';
                           return $btn;
                    })
                    ->rawColumns(['action','enq','counsellor_name'])
                    ->make(true);
        }
        return view('enquiry.Coaching');
    }

    public function Failed(Request $request)
    {
        if ($request->ajax()) {

            $data = Enquiry::orderBy("updated_at","desc")->select('*')->with('City','State','Country','Counsellor')->where('status','Failed');

            return Datatables::of($data)
                    ->addColumn('details_url', function($user) {
                        return url('admin/inquiry/FollowUp/'.$user->id);
                    })
                    ->addColumn('counsellor_name', function($user) {
                        $user_names="";
                        foreach($user->Counsellor as $users)
                        {
                            $user_names.='<a href="#" class="badge badge-info">'.$users->Detail->name.'</a> ';
                        }
                        return $user_names ?? '<a href="#" class="badge badge-success">Not Assign Yet</a>';
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
                        $btn .='<a href="'.route('Enquires.ChangeStatus',['Enquire'=>$row->id,'Status'=>'Pending']).'" class="btn btn-success btn-sm mb-1">Activate Enquiry</a>';
                        // $btn .='<a href="'.route('EnquiryDetail.add',$row->id).'" class="assessment btn btn-info btn-sm mb-1">Activate Enquiry</a>';
                        return $btn;
                    })
                    ->rawColumns(['action','enq','counsellor_name'])
                    ->make(true);
        }
        return view('enquiry.Failed');
    }

    public function ChangeStatus($id,$status)
    {
        $enquiri=Enquiry::find($id);
        $enquiri->status=$status;
        $enquiri->save();
        return redirect()->back()->withInfo("Updated Status Successfully.");
    }

    public function get(){

        // $Transaction= TransactionCredit::all();
        // print_r($Transaction);
        // return view('enquiry.index', compact('Transaction'));
    }
}
