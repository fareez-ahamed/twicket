@extends('nav-layout')

@section('content')

<div class="row mention-reply">
	<div class="col-sm-2 col-sm-offset-2">
		<img class="img-circle" src="{{ $mention['customer']['image_url'] }}" />
	</div>
	<div class="col-sm-6">
		<p>{{ $mention['text'] }}</p>
	</div>
</div>

<form action="/mention/reply" method="POST" class="form-horizontal" role="form">

	{{ csrf_field() }}

	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-2">
			<textarea class="form-control" rows="3" name="message">{{ '@'.$mention['customer']['twitter_id'] }}</textarea>
		</div>
	</div>

	<div class="form-group">
		<div class="col-sm-10 col-sm-offset-2">
			<button type="submit" class="btn btn-primary">Reply</button>
			<button class="btn btn-danger">Close</button>
		</div>
	</div>
</form>
@endsection