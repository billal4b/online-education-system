<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ArabicDictionary extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'arabic_word',
        'bengali_word',
        'is_active',
    ];
}
