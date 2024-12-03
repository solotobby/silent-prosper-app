<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $fillable = [ 'paypal_product_id', 'paypal_product_name'];
}
