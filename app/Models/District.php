<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'province_id', 'name', 'type', 'slug'
    ];
}