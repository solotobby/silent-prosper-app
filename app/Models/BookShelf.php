<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookShelf extends Model
{
    protected $fillable = ['user_id', 'story_id'];
}
