@extends('master')

@section('content')

	<ul class="profiles">	
		@foreach($profiles as $profile)
			<li>
				<figure>
					<img src="{{ $profile->imgpath }}" alt="{{ $profile->l_name }}">
					<figcaption>
						<a href="{{ route('profiles.show', ['profiles' => $profile->id]) }}">
						{{ $profile->username}}
						</a>
						{{ $profile->l_name }}
						{{ $profile->f_name }}
						{{ $profile->age}}
						{{ $profile->about}}
					</figcaption>
				</figure>
			</li>
		@endforeach
	</ul>
@stop