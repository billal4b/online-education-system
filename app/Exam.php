<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exam extends Model
{
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

   protected $fillable = [
    'exam_title',
    'exam_key',
    'question',
    'answer',
    'course_title',
    'user_name',
    'user_id',
    'marks',
    'start_time',
    'end_time',
    'duration',
    'date_time',
    'is_destroy',
    'is_enroll',
    'is_active'
  ];
}
