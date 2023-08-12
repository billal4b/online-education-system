<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notice extends Model
{
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'file',
        'slug',
        'publish_at',
        'order',         
        'is_active',         
        'is_destroy',         
    ];
}
