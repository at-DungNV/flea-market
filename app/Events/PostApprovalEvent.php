<?php

namespace App\Events;

use App\Models\Notification;
use App\Models\User;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class PostApprovalEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    
    /**
    * User
    *
    * @var User
    */
    public $user;
    
    /**
     * Post
     *
     * @var Post
     */
    public $notification;
    
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $notification)
    {
        $this->user = $user;
        $this->notification = $notification;
        $user->unread_notification = $user->unread_notification + 1;
        $user->save();
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification');
    }
}
