<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $guarded = [];

    public function mentions()
    {
    	return $this->hasMany('App\Mention');
    }
}
