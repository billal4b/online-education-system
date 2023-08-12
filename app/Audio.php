<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Audio extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'course_title',
        'audio_local',
        'audio_url',
        'order',
        'is_active',
        'is_destroy',
    ];
}
