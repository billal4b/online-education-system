<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'mobile',
        'password',
        'address',
        'is_admin',
        'is_active',
        'course_title',
        'course_id',
        'select_course',
        'notification',
        'gender',
        'blood_group',
        'dob',
        'nid_no',
        'image',
        'status',
        'is_kids',
        'student_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function isOnline(){
        return Cache::has('user-is-online-'.$this->id);
    }

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
    
    public function student()
    {
        return $this->hasOne(Student::class, 'student_id','id');
    }
}
