<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'parent_id', 'slug'
    ];
    
    /**
     * Post belongs to an User.
     *
     * @return Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    
    /**
     * Post has many children.
     *
     * @return Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    
    /**
     * Get Category by slug
     *
     * @param String $slug slug of post
     * @return Object Category
     */
    public function getIdBySlug($slug)
    {
        return $this->where('slug', '=', $slug)->select('id')->first()->id;
    }
}
