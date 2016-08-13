<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TicketMessage extends Model
{
    protected $guarded = [];

    public function ticket()
    {
    	return $this->belongsTo('App\Ticket');
    }

    public function mention()
    {
    	return $this->hasOne('App\Mention');
    }
}
