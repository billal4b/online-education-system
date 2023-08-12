<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
  /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

   protected $fillable = [
    'course_title', 
    'exam_name',
    'subject_name',
    'pdf_file',
    'is_destroy'
  ];
}
