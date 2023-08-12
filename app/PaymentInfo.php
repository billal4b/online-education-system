<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentInfo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'student_name',
        'user_id',
        'payment_method',
        'payment_amount',
        'transaction_id',
        'course_title',
        'batch_id',   
        'contact',   
        'date_time',         
        'is_active',         
        'is_destory',         
    ];

    /**
     * Set the course
     *
     */

    public function setCourseTitleAttribute($value)
    {

        //$this->attributes['course_title'] = json_encode($value);
        $this->attributes['course_title'] = implode(',', $value);
    }
    /**
     * Get the course
     *
     */
    public function getCourseTitleAttribute($value)
    {
      //dd(json_decode($value));
       // return $this->attributes['course_title'] = json_decode($value);
        return explode(',', $value);
    }

    public function courses()
    {
        return $this->belongsTo(Course::class, 'course_title','id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }

}
