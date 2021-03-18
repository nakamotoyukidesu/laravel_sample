<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ramen extends Model
{
    protected $fillable = [
        'twitter_id',
        'name',
        'category',
        'image_url',
        'address',
        'query',
        'account_name',
    ];
}
