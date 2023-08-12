<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FilePdf extends Model
{
    /**
  * The attributes that are mass assignable.
  *
  * @var array
  */

   protected $fillable = [
    'title',
    'course_id',
    'course_title',
    'subject_code',
    'subject',
    'content',
    'slug',
    'pdf_file',
    'is_active',
    'is_destroy'
  ];

  public function courses()
  {
      return $this->belongsTo(Course::class, 'course_id', 'id');
  }
}
