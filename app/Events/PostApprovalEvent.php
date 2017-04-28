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
    public $post;
    
    /**
     * Notification
     *
     * @var notification
     */
    public $notification;
    
    
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($user, $post, $notification)
    {
        $this->user = $user;
        $this->post = $post;
        $this->notification = $notification;
        $this->user->updateUnreadNotification($post->user->getUnreadNotification()+ 1);
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
