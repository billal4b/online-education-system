<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

   protected $fillable = [
        'title', 'image_type', 'image_name','image_thumb','order','is_active',
    ];

}
