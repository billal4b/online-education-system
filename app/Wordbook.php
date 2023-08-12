<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wordbook extends Model
{
      /**
    * The attributes that are mass assignable.
    *
    * @var array
    */

  protected $fillable = [
    'arabic_word', 
    'bengali_word',
    'english_word',
    'book_name',
    'lesson_name',
    'is_destory',
    'is_active'
  ];

}
