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

<form action="/mention/convert/{{ $mention['tweet_id'] }}" method="POST" class="form-horizontal" role="form">

	{{ csrf_field() }}

	<div class="form-group">
		<label for="title" class=" col-sm-offset-2 col-sm-2">Title</label>
		<div class="col-sm-6">
			<input type="text" name="title" id="inputTitle" class="form-control" required="required"  title="">
		</div>
	</div>

	<div class="form-group">
		<label for="description" class="col-sm-offset-2 col-sm-2">Description</label>
		<div class="col-sm-6">
			<textarea class="form-control" rows="3" name="description"></textarea>
		</div>
	</div>

	{{-- <div class="form-group">
		<label for="labels" class="col-sm-offset-2 col-sm-2">Labels</label>
		<div class="col-sm-6">
			<div class="tagsinput-primary">
				<input name="tagsinput" class="tagsinput" data-role="tagsinput" value="School, Teacher, Colleague" />
			</div>
		</div>
	</div> --}}

	<div class="form-group">
		<div class="col-sm-8 col-sm-offset-4">
			<button type="submit" class="btn btn-primary">Create Ticket</button>
		</div>
	</div>
</form>
@endsection