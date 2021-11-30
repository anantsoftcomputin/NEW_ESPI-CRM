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
        Event::dispatch(new PushNotification($user,$request->title,$request->body));
    }

}
