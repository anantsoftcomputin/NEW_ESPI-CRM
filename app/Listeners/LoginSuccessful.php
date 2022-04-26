<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Login;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;
use Illuminate\Queue\InteractsWithQueue;

class LoginSuccessful
{
    protected $request;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    /**
     * Handle the event.
     *
     * @param  \Illuminate\Auth\Events\Login  $event
     * @return void
     */
    public function handle(Login $event)
    {
        activity()
            ->withProperties([
                'Email'=>$event->user->email,
                'Role'=>$event->user->roles->pluck('name'),
                'Name'=>$event->user->name,
                'LoginTime'=>date('h:i:s A'),
                'URL'=> $this->request->path(),
                'IP'=>$this->request->getClientIp()
                ])
            ->event('LoginSuccessful')
            ->log('Login Action ');
        // activity()->log('Look mum, I logged something');
    }
}
