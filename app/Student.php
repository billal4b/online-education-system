<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = [
        'student_name',
        'select_course',
        'edu_qua',
        'nid',
        'gender',
        'blood_group',
        'dob',
        'course_name',
        'student_image',
        'father_name',
        'mother_name',
        'address',
        'guardian_name',
        'relation',
        'email',
        'contact',
        'date_time',
        'is_admin',
        'status',
        'is_active',
        'notification',
    ];
    
    
    /**
     * Set the course
     *
     */

    public function setSelectCourseAttribute($value)
    {
       $this->attributes['select_course'] = implode(',', $value);
        //$this->attributes['select_course'] = json_encode($value);
    }

    /**
     * Get the course
     *
     */
    public function getSelectCourseAttribute($value)
    {
        //return $this->attributes['select_course'] = json_decode($value);
         return explode(',', $value);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'select_course','id');
    }

}
