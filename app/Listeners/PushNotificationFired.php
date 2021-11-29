<?php

namespace App\Listeners;

use App\Events\PushNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\User;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class PushNotificationFired
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PushNotification  $event
     * @return void
     */
    public function handle(PushNotification $event)
    {
        Log::error("call Lisnar ");

        $firebaseToken = User::where('id',$event->userId)->whereNotNull('fcm_token')->pluck('fcm_token')->all();
        Log::error(json_encode($firebaseToken));


        $SERVER_API_KEY = 'AAAAvOyc2wM:APA91bGzF17Qg5F4d-e30-sMDxVeaW2UsQnXwXWmvQw79guuuZ-e5Af_p5QsMO4uaoyB26ERa4xDFrvof8adi0CoJns6GMCZlO5Sj-jXf8Yc7hf_BKld-i2kWlySnUxnnmC5O4usoJMa';

        $data = [
            "registration_ids" => $firebaseToken,
            "notification" => [
                "title" => $event->massage,
                "body" => $event->body,
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
        // $user = User::find($event->userId)->toArray();

        // Mail::send('eventMail', $user, function($message) use ($user) {
        //     $message->to($user['email']);
        //     $message->subject('Event Testing');
        // });
    }
}
