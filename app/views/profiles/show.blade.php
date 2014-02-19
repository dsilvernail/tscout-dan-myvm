@extends('master')

@section('content')	
	
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
	<div class="rowpad">

		<div class="col-md-4">

			<h3>Following</h3>

		</div>
		<div class="col-md-8" align="left">
			<div class="rowpad">
				<h3>Review</h3>
				{{ Form::textarea('post', '', array('placeholder' => 'Post your review')) }}
			</div>
			<div class="rowpad" align="center">
				 {{ Form::submit('Submit', array('class' => 'btn btn-success')) }}
			</div>
			<div class="rowpad">
				 @include('activities')
			</div>

		</div>	

	</div>
@stop