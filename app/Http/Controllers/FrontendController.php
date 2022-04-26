<?php

namespace App\Http\Controllers;

use App\Http\Requests\enquire\AddFromFront;
use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Enquiry;
use Mail;
use Illuminate\Support\Facades\Log;
use App\Events\PushNotification;
use App\Jobs\WelcomeEmailJob;
use Event;
use App\Mail\AddEnquiry;

class FrontendController extends Controller
{
    public function joinespi($branch)
    {
        $company=Company::where('subdomain',$branch)->first();
        return view('FrontEnd.join',compact('branch'));
    }

    public function joinespistore($branch,AddFromFront $request)
    {
        $validated = $request->validated();
        $validated['enquiry_id'] ="ESPI_".$this->generateUniqueCode();
        $validated['name']=$request->first_name .' '.$request->middle_name.' '.$request->last_name;
        $validated['dob']=date("Y-m-d",strtotime($request->dob));
        $validated['added_by_id'] = 1;
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

        $enq=Enquiry::create($validated);
        $admin=get_user(1);

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
        if($admin->fcm_token)
        {
            $NotificationBody="New Enquiry Added By Front Desk";
            Event::dispatch(new PushNotification($admin->id,'New Enquiry Generate',$NotificationBody));
        }

        dispatch(new WelcomeEmailJob($enq));

        return view('FrontEnd.thankyou',compact('branch','enq'));
    }

    public function generateUniqueCode()
    {
        do {
            $code = "ESPI_".random_int(10000000, 99999999);
        } while (Enquiry::where("enquiry_id", "=", $code)->first());
        return $code;
    }
}
