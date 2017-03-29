<?php

namespace App;

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
        'name', 'email', 'password', 'is_active', 'birthday', 'address', 'phone', 'gender', 'avatar', 'unread_notification'
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
     * Set the user's birthday.
     *
     * @param  string $birthday
     * @return void
     */
    public function setBirthdayAttribute($birthday)
    {
        $this->attributes['birthday'] = Carbon::createFromFormat('y-m-d', $birthday)->toDateString();
    }
    
    /**
     * Get the user's birthday.
     *
     * @param  string $birthday
     * @return string
     */
    public function getBirthdayAttribute($birthday)
    {
        return date("d/m/Y", strtotime($birthday));
    }
    
}
