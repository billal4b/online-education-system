<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ebook extends Model
{
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

   protected $fillable = [
    'course_title', 
    'subject_code',
    'subject',
    'content',
    'section',
    'slug',
    'pdf_file',
    'is_active',
    'is_destroy'
  ];
}
