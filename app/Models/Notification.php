<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'data'
    ];
    
    /**
     * Post belongs to an User.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    
    
    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDataAttribute($data)
    {
        return json_decode($data);
    }
}
