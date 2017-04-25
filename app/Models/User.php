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
        'name', 'email', 'password', 'is_active', 'birthday', 'address', 'phone', 'gender', 'avatar', 'unread_notification', 'is_admin'
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
    
    public function messages()
    {
        return $this->hasMany(Message::class);
    }
    
    public function isAdmin()
    {
        return $this->is_admin;
    }
    
    public function isActive()
    {
        return $this->is_active;
    }
    
    public function setActive($isActive)
    {
       $this->is_active = (int)$isActive;
    }
    
}
