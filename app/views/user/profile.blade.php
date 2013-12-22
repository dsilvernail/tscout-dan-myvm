@extends('master')


@section('content')

	<div class="span8 well">
        <h4 align='center'>Hello {{ ucwords(Auth::user()->username) }}</h4>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h2>About Me:</h2>
			<p>Description User can input would go here.</p>
			<p>Zip: {{ ucwords(Auth::user()->zip) }}</p>
		</div>
	</div>


@stop
