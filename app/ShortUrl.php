<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShortUrl extends Model
{    
    protected $fillable = ['long_url', 'short_url'];

    public static $rules = ['long_url' => 'required|unique:short_urls|url'];
}
