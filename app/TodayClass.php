<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TodayClass extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

     protected $fillable = [
        'video_title',
        'course_id',
        'video_url_id',
        'course_title',
        'today_class',
        'order',
        'gender',
        'is_active',
        'is_destroy'
    ];
    
    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }


}
