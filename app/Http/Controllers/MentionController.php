<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Auth;
use App\Twitter;
use App\Mention;
use App\Ticket;
use App\TicketMessage;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MentionController extends Controller
{
    private $twitter;

    function __construct()
    {
        $this->twitter = new Twitter();
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function ignore($tweet_id)
    {
        // dd($tweet_id);
        Mention::where("tweet_id",$tweet_id)
            ->first()
            ->fill(['status'=>'ignored'])
            ->update();
        return redirect('/home');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function replyGet(Request $req, $tweet_id)
    {
        $req->session(['tweet_id'=>$tweet_id]);
        $mention = Mention::where("tweet_id",$tweet_id)
            ->with('customer')
            ->first();
        return view('reply', compact('mention'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  Request  $request
     * @return Response
     */
    public function replyPost(Request $req)
    {
        $tweet_id = $req->session()->pull('tweet_id');
        $this->twitter->reply($tweet_id,$req->input('message'));
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function convert(Request $req,$tweet_id)
    {
        $req->session(['tweet_id'=>$tweet_id]);
        $mention = Mention::where("tweet_id",$tweet_id)
            ->with('customer')
            ->first();
        return view('create-ticket', compact('mention'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function convertPost(Request $req,$tweet_id)
    {
        // $tweet_id = $req->session()->pull("tweet_id");
        // dd($tweet_id);
        $mention = Mention::where("tweet_id",$tweet_id)
            ->with('customer')
            ->first();

            // dd($mention);
        
        Auth::user()->tickets()->create([
                "title" => $req->input('title'),
                "description" => $req->input('description'),
                "status" => "open",
                "mention_id" => $mention->id
            ])->ticketMessages()->create([
                "message" => $mention->text,
                "customer" => true,
                "mention_id" => $mention->id
            ]);
        $ticket = Ticket::latest()->first();
        $mention->fill(['status'=>'converted'])->update();
        return redirect("/ticket/".$ticket->id);
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
