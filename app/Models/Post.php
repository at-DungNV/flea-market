<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
use App\Models\Image;
use Image as ImageIntervention;

class Post extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'user_id', 'province_id', 'district_id', 'ward_id', 'title', 'price', 'state', 'type', 'phone', 'address', 'slug', 'description'
  ];

  /**
   * Post has many images.
   *
   * @return Illuminate\Database\Eloquent\Relations\HasMany
   */
  public function images()
  {
      return $this->hasMany('App\Models\Image');
  }

  /**
   * Insert image to database and storage
   *
   * @param Array $images images from uploading
   * @return void
   */
  public function storeImages($images) {
    $index = strtotime(Carbon::now());
    $path = Storage::disk('local')->getDriver()->getAdapter()->getPathPrefix();
    foreach ($images as $image) {
        $url = str_slug($this->title. ' '. $index, '-'). '.'. $image->getClientOriginalExtension();
        $index++;
        // store images to storage
        ImageIntervention::make($image)->resize(416, 256)->save($path. '/'. $url);

        // store images to database
        $img = new Image;
        $img->store($url, $this->id);
    }
  }
}
