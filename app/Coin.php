<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    protected $table = 'coin';
    protected $fillable = ['long_name', 'symbol', 'endpoint', 'image_url', 'algorithm'];
}
