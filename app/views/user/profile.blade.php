@extends('master')


@section('content')

	<div class="span8 well">
        <h4 align='center'>Hello {{ ucwords(Auth::user()->username) }}</h4>
	</div>

	<div class="row">
		<div class="col-md-4">
			<h2>About Me:</h2>
			<p>Description User can input would go here.</p>

		</div>

		<div class="col-md-6">
			<h2>My Profile: {{ $profile->about }}</h2>
		</div>
		
	</div>


@stop
