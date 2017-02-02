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

  public function storeImages($images) {
    $index = strtotime(Carbon::now());
    foreach ($images as $image) {
        $url = str_slug($this->title. $index, '-'). '.'. $image->getClientOriginalExtension();
        $index++;
        $img = new Image;
        Storage::putFileAs(
            'uploads', $image, $url
        );

        $img->url = $url;
        $img->post_id = $this->id;
        $img->save();
    }
  }
}
