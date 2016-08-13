<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Twitter;
use App\Ticket;
use App\TicketMessage;
use App\Mention;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($ticket_id)
    {
        $ticket = Ticket::with('ticketMessages')->find($ticket_id);
        $tweet_id = Mention::find(
                TicketMessage::where('customer',true)
                ->where('ticket_id',$ticket->id)
                ->latest()
                ->first()->mention_id
                )->tweet_id;
        $customer_id = Mention::with('customer')
                        ->find($ticket->mention_id)->customer->twitter_id;
        // dd($ticket);
        return view('ticket',compact('ticket','tweet_id','customer_id'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function reply(Request $req,$ticket_id,$message_id)
    {
        $mention = Mention::find(TicketMessage::find($ticket_id)->mention_id);
        
        $twitter = new Twitter();

        $twitter->reply($mention->tweet_id,$req->input('message'));
        Ticket::find($ticket_id)->ticketMessages()->create([
                "customer" => false,
                "message" => $req->input('message')
            ]);
        return redirect("ticket/$ticket_id");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function close(Request $request,$ticket_id)
    {
        Ticket::find($ticket_id)->fill(['status'=>'closed'])->update();
        return redirect("ticket/$ticket_id");   
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
