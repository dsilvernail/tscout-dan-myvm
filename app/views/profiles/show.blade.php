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
	
	<div class="row" style="padding-bottom:20px; border-bottom: 1px solid #ccc;">

		<div class="col-xs-6 col-md-4">
			<img src="{{ $profile->imgpath }}" alt="{{ $profile->l_name }}">
			
		</div>

		<div class="col-xs-12 col-sm-6 col-md-8">
			<h2> {{ $profile->f_name }} {{ $profile->l_name }}</h2>
			<h3> Age:{{ $profile->age }} </h3>
			<h3> Zip Code:{{ $profile->zip }} </h3>
			<h3> About:{{ $profile->about }}</h3>

		</div>
		
	</div>

	<div class="row" style="padding-bottom:20px; border-bottom: 1px solid #ccc;">

		<div class="col-xs-6 col-md-4">
				<div>
					<h3>Following</h3>
					@if(!is_null($friends_id))
				 	<ul>
				 		@foreach ($friends_id as $friend)
				 		<li>
				 			<p> {{$friend}} </p>
				 		</li>
				 		@endforeach
				 	</ul>
				 	@else
				 	<ul>
				 		<li>
				 			<p>You are not yet following anyone</p>
				 		</li>
				 	</ul>

				 	@endif

				</div>



		</div>


		<div class="col-xs-12 col-sm-6 col-md-8">

			@include('activities.show')

		</div>

	</div>


@stop