<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class FcmTokenController extends Controller
{
    //
    function index()
    {
        return view("fcm.index");
    }

    public function sendNotification(Request $request)
    {
        $firebaseToken = User::whereNotNull('fcm_token')->pluck('fcm_token')->all();
        
        $SERVER_API_KEY = 'AAAAQ--KII4:APA91bHbcNhWF8qnsOkAiVnDCcSBv2d8YxzBavbRCWIpZIoU00RDldZM61Wn72ycqs_qTtBMNB5yhmpQ2BO8B9W-Mx2TC4WXqoe7Qnc8FziJSe9zgkmN2R_4CPHKMSce4N2WAUJ5Bo3X';
        
        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $request->title,
                "body" => $request->body,  
            ]
        ];
        $dataString = json_encode($data);
    
        $headers = [
            'Authorization: key=' . $SERVER_API_KEY,
            'Content-Type: application/json',
        ];
    
        $ch = curl_init();
      
        curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);
               
        $response = curl_exec($ch);
  
        dd($response);
    }

}
