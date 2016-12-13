@extends('layout')

@section('content')
	@if(Session::has('message'))
		<div class="alert alert-success"> {{ session::get('message') }}</div>
	@endif
	<h1>Selling Your Home !</h1>
	<hr>
	<form action="{{ asset('/flyers') }}" method="POST" enctype="multipart/form-data">

		@include('flyers.form')

		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
					<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		
	</form>
@stop