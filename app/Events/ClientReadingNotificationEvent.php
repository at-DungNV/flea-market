<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Models\User;

class ClientReadingNotificationEvent implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;
    
    /**
    * User
    *
    * @var User
    */
    public $user;
    
    /**
    * User
    *
    * @var User
    */
    public $unreadNotification;
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $unreadNotification)
    {
        $this->user = $user;
        $this->unreadNotification = $unreadNotification;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('notification'.$this->user->id);
    }
}
