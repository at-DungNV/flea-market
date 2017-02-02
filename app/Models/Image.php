<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'url', 'post_id'
    ];

    /**
     * Insert image to database
     *
     * @param Integer $id post id
     * @param String  $url image url
     * @return void
     */
    public function store($url, $id) {
      $this->url = $url;
      $this->post_id = $id;
      $this->save();
    }
}
