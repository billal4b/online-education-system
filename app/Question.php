<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

   protected $fillable = [
    'course_title',
    'exam_title',
    'question',
    'duration',
    'marks',
    'start_time',
    'end_time',
    'date_time',
    'is_destroy',
    'is_active'
  ];
}
