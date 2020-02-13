<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Models;


class GalleryDetail extends Model {

  use CrudTrait;

  /*
  |--------------------------------------------------------------------------
  | GLOBAL VARIABLES
  |--------------------------------------------------------------------------
  */

  protected $table = 'gallery_detail';
  protected $primaryKey = 'gallery_detail_id';
  // public $timestamps = false;
  protected $guarded = ['gallery_detail_id'];

  protected $fillable = ['gallery_id','gallery_detail_name','image','created_at','updated_at'];
  // protected $hidden = [];
  // protected $dates = [];

  /*
  |--------------------------------------------------------------------------
  | FUNCTIONS
  |--------------------------------------------------------------------------
  */
public function gallery(){
    return $this->belongsTo('App\Models\Gallery','gallery_id');
}

public function setImageAttribute($value){
    $attribute_name = 'image';
    $disk = config('backpack.base.root_disk_name');
    $destination_path = "public/uploads/.product";
    if ($value==null) {
      // delete the image from disk
      \Storage::disk($disk)->delete($this->{$attribute_name});

      // set null in the database column
      $this->attributes[$attribute_name] = null;
  }

  if (starts_with($value, 'data:image'))
  {
      // 0. Make the image
      $image = \Image::make($value)->encode('jpg', 90);
      // 1. Generate a filename.
      $filename = md5($value.time()).'.jpg';
      // 2. Store the image on disk.
      \Storage::disk($disk)->put($destination_path.'/'.$filename, $image->stream());
      // 3. Save the public path to the database
  // but first, remove "public/" from the path, since we're pointing to it from the root folder
  // that way, what gets saved in the database is the user-accesible URL
      $public_destination_path = Str::replaceFirst('public/', '', $destination_path);
      $this->attributes[$attribute_name] = $public_destination_path.'/'.$filename;
  }
}

  /*
  |--------------------------------------------------------------------------
  | RELATIONS
  |--------------------------------------------------------------------------
  */
 

  /*
  |--------------------------------------------------------------------------
  | SCOPES
  |--------------------------------------------------------------------------
  */

  /*
  |--------------------------------------------------------------------------
  | ACCESORS
  |--------------------------------------------------------------------------
  */

  /*
  |--------------------------------------------------------------------------
  | MUTATORS
  |--------------------------------------------------------------------------
  */
}