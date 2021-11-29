<?php

namespace App\Http\Controllers;

use App\Events\PushNotification;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Event;
use Illuminate\Support\Facades\Log;

class FcmTokenController extends Controller
{
    //
    function index()
    {
        return view("fcm.index");
    }

    public function sendNotification($user,Request $request)
    {
        Log::error("event call test");
        Event::dispatch(new PushNotification($user,$request->title,$request->body));

        // $firebaseToken = User::where('id',$user)->whereNotNull('fcm_token')->pluck('fcm_token')->all();

        // $SERVER_API_KEY = 'AAAAvOyc2wM:APA91bGzF17Qg5F4d-e30-sMDxVeaW2UsQnXwXWmvQw79guuuZ-e5Af_p5QsMO4uaoyB26ERa4xDFrvof8adi0CoJns6GMCZlO5Sj-jXf8Yc7hf_BKld-i2kWlySnUxnnmC5O4usoJMa';

        // $data = [
        //     "registration_ids" => $firebaseToken,
        //     "notification" => [
        //         "title" => $request->title,
        //         "body" => $request->body,
        //     ]
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

        dd("send".$user);
    }

}
