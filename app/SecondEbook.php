<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SecondEbook extends Model
{
    protected $fillable = [
        'published',
        'publish_time',
        'course_id',
        'subject_type',
        'topic',
        'content_type',
        'content',
        'document'
      ];
}
