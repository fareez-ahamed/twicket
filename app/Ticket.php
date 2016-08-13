<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    //

    protected $guarded = [];

    public function mention()
    {
        return $this->hasOne('App\Mention');
    }

    public function ticketMessages()
    {
    	return $this->hasMany('App\TicketMessage');
    }

    public function user()
    {
    	return $this->belongsTo('App\User');
    }
}
