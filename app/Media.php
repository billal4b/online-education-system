<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

    protected $fillable = [
       'title',
       'file_type',
       'course_id',
       'course_title',
       'course',
       'audio',
       'video',
       'pdf',
       'order',
       'is_active',
   ];
   
   /**
     * Set the course
     *
     */
    
  
    public function setCourseAttribute($value)
    {
        $this->attributes['course'] = json_encode($value);
        //$this->attributes['course'] = implode(',', $value);
    }
    
    /**
     * Get the course
     *
     */
    public function getCourseAttribute($value)
    {
      //dd(json_decode($value));
         return $this->attributes['course'] = json_decode($value);
         //return explode(',', $value);

    }
    
     public function courses()
    {
        return $this->belongsTo(Course::class, 'course_id','id');
    }
}
