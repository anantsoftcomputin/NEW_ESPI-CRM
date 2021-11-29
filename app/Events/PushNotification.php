<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use App\Models\User;

class PushNotification
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $userId;
    public $massage;
    public $body;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($userId,$massage,$body)
    {
        $this->userId = $userId;
        $this->massage = $massage;
        $this->body = $body;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
