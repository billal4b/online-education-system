<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseDetails extends Model
{
    
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */ 

    protected $fillable = [
        'course_name',
        'course_details',
        'course_details_bd',
        'image',
        'is_active',         
    ]; 

}
