<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Province extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'type', 'slug'
    ];
    
    /**
     * Province has many Districts.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function districts()
    {
        return $this->hasMany('App\Models\District');
    }
    
    /**
     * Get address detail
     *
     * @return void
     */
    public function getAddress() {
      return $this::with('districts', 'districts.wards')->get();
    }
}
