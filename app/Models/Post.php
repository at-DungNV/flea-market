<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Storage;
use App\Models\Image;
use App\Models\Province;
use App\Models\District;
use App\Models\Ward;
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
   * Post belongs to a Province.
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function province()
  {
      return $this->belongsTo('App\Models\Province');
  }
  
  /**
   * Post belongs to a District.
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function district()
  {
      return $this->belongsTo('App\Models\District');
  }
  
  /**
   * Post belongs to a Ward.
   *
   * @return Illuminate\Database\Eloquent\Relations\BelongsTo
   */
  public function ward()
  {
      return $this->belongsTo('App\Models\Ward');
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
        ImageIntervention::make($image)->resize(600, 400)->save($path. '/'. $url);

        // store images to database
        $img = new Image;
        $img->store($url, $this->id);
    }
  }
  
  /**
   * Search
   *
   * @param Array $images images from uploading
   * @return Object Post
   */
  public static function search($q, $address, $type, $order, $total, $offset) {
    $query = Post::with(['images'=>function($query) {
                    return $query->limit(1);
                  }])
                  ->where('state', '=', \Config::get('common.TYPE_POST_ACTIVE'));
    if ($q != null) {
      $query = $query->where('title', 'like', '%'.$q.'%');
    }
    if ($address != '') {
      // if District added you can you intersect
      $query = $query->whereHas('province', function ($query) use ($address) {
          $query->where('name', '=', $address);
      });
    }
    if ($type != '') {
      $query = $query->where('type', '=', $type);
    }
    if ($order != '') {
      $query = $query->orderBy('price', $order);
    }
    $total = $total == $query->count() ? $total : $query->count();
    
    $posts = $query->take(\Config::get('common.NUMBER_ITEM_PER_PAGE'))->offset($offset)->orderBy('created_at', 'desc')->get();
    $data = array(
        'posts'  => $posts,
        'total' => $total
    );
    return $data;
  }
}
