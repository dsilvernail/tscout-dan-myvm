@extends('master')

@section('content')	
<head>
	<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
		
	<script type="text/javascript"> 
		var pusher = new Pusher('88f8c864a13f0441b7cc');

		var channel = pusher.subscribe('my-channel');

		channel.bind('my-event', function(data) {
  			alert('An event was triggered with message: ' + data.message);
		});
	</script> 
</head>

	<div class="row">

		<div class="col-md-4">
			<img src="{{ $profile->imgpath }}" alt="{{ $profile->l_name }}">
			
		</div>

		<div class="col-md-8">
			<h2> {{ $profile->f_name }} {{ $profile->l_name }}</h2>
			<h3> Age:{{ $profile->age }} </h3>
			<h3> Zip Code:{{ $profile->zip }} </h3>
			<h3> About:{{ $profile->about }}</h3>

		</div>
		
	</div>

	<div class="row">

		<div class="col-md-4">
			<h3>Comment</h3>
		</div>

		<div class="col-md-8">

			@include('activities.show')

		</div>

	</div>

	<div class="rowpad">

		<div class="col-md-4">

			<h3>Following</h3>

		</div>

		<div class="col-md-8" align="left">

				 @include('activities.index')

		</div>	

	</div>

@stop