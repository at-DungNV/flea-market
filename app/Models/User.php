<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'facebook_id', 'name', 'email', 'password', 'is_active', 'birthday', 'address', 'phone', 'gender', 'avatar', 'unread_notification', 'is_admin'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Encode the password
     *
     * @param string $password password input
     *
     * @return void
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = bcrypt($password);
    }
    
    /**
     * User has many messages.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    /**
     * Check if admin or not
     *
     * @return boolean
     */
    public function isAdmin()
    {
        return $this->is_admin;
    }
    
    /**
     * Check if account is blocked or not
     *
     * @return boolean
     */
    public function isActive()
    {
        return $this->is_active;
    }
    
    /**
     * Update unblocked or blocked account
     *
     * @param Int $isActive state
     * @return void
     */
    public function setActive($isActive)
    {
       $this->is_active = (int)$isActive;
    }
    
    /**
     * Return user's unread notification
     *
     * @return Int
     */
    public function getUnreadNotification()
    {
        return $this->unread_notification;
    }
    
    /**
     * Update unread notification
     *
     * @param Int $number number of unread notifications
     * @return void
     */
    public function updateUnreadNotification($number = 0)
    {
        $this->unread_notification = $number;
        $this->save();
    }
    
}
