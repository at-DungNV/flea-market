<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;

class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'title', 'price', 'state', 'type', 'address', 'slug', 'description'
  ];


  /**
   * Insert image to database and storage
   *
   * @param Array $images images from uploading
   * @return void
   */
  public function storeImages($images) {
    $index = strtotime(Carbon::now());
    foreach ($images as $image) {
        $url = str_slug($this->title. ' '. $index, '-'). '.'. $image->getClientOriginalExtension();
        $index++;
        // store images to storage
        Storage::putFileAs(
            'uploads', $image, $url
        );
        // store images to database
        $img = new Image;
        $img->store($url, $this->id);
    }
  }
}
