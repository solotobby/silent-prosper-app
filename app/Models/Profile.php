<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = ['user_id', 'about', 'tiktok', 'x', 'instagram', 'facebook', 'currency', 'language', 'country', 'region', 'city'];
}
