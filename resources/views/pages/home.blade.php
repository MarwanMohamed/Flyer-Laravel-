@extends('layout')

@section('content')

	<div class="jumbotron">
      <div class="container">
		<h1>flyer</h1>
        <p>
       		This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.
        </p>
        <a href="{{ asset('/flyers/create') }}" class="btn btn-primary btn-lg">Create a Flyer</a>

      </div>
    </div>

@stop