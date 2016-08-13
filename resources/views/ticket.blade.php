@extends('nav-layout')

@section('content')

<h3>{{ '#'.$ticket['id'].' '.$ticket['title'] }}</h3>
<span class="badge success"><h5>{{ $ticket['status'] }}</h5></span>
<p class="time">{{ $ticket->created_at->diffForHumans() }}</p>

@foreach($ticket['ticketMessages'] as $message)
<div class="row">
	<div class="col-sm-10 col-sm-offset-1 thread-message">
	<p>{{ $message['message'] }}</p>
	<p class="time">{{ $message->created_at->diffForHumans() }}</p>
	</div>
</div>
@endforeach

<form action="/ticket/{{$ticket['id']}}/{{$ticket->ticketMessages->last()->id}}/reply" method="POST" class="form-horizontal ticket-reply" role="form">

	{{ csrf_field() }}

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-1">
			<textarea class="form-control" rows="3" name="message">{{ '@'.$customer_id }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-1">
			<button type="submit" class="btn btn-primary">Reply</button>
			<a href="/ticket/{{$ticket['id']}}/close" class="btn btn-danger">Close</a>
		</div>
	</div>
</form>

@endsection