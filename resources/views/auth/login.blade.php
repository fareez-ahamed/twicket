@extends('master')

@section('master-content')
<div class="row login-box">
	<div class="col-sm-4 col-sm-offset-4">
		<div class="well well-lg">
			<form action="/auth/login" method="POST" class="form-horizontal" role="form">

				{{ csrf_field() }}

				<div class="form-group">
					<div class="col-sm-12">
						<input type="email" name="email" id="inputEmail" class="form-control" value="" required="required" title="">
					</div>
				</div>

				<div class="form-group">
					<div class="col-sm-12">
						<input type="password" name="password" id="inputPassword" class="form-control" value="" required="required" title="">
					</div>
				</div>		

				<div class="form-group">
					<div class="col-sm-12">
						<button type="submit" class="btn btn-block btn-primary">Login</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

@endsection