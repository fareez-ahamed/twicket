@extends('nav-layout')

@section('content')

	@foreach($mentions as $mention)
	<div class="row mention">
		<div class="col-sm-2">
			<img class="img-circle" src="{{ $mention['customer']['image_url'] }}" />
		</div>
		<div class="col-sm-9">
			<p><b>{{ $mention['customer']['name'] }}</b></p>
			<p>{{ $mention['text'] }}</p>
			<div class="btn-group btn-group-xs" role="group">
				<a class="btn btn-primary" href="/mention/reply/{{ $mention['tweet_id'] }}">Reply</a>
				<a class="btn btn-primary" href="/mention/convert/{{ $mention['tweet_id'] }}">Create Ticket</a>
				<a class="btn btn-primary" href="/mention/ignore/{{ $mention['tweet_id'] }}">Ignore</a>
			</div>
			
		</div>
	</div>
	@endforeach

@endsection