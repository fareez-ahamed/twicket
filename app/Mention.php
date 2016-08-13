<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mention extends Model
{
    protected $guarded = [];


    public function scopeNewMention($query)
    {
    	return $query->where('status','new');
    }

    public function customer()
    {
    	return $this->belongsTo('App\Customer');
    }
}
