@section('navbar')
		<div class="navbar navbar-inverse navbar fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">Home</a>
					<a class="navbar-brand" href="/aboutus">About</a>
					@if (Auth::check())
					<a class="navbar-brand" href="/findusers">Search</a>
					<a class="navbar-brand" href="#opensetup">SettingsModal</a>
					@include('home.setup')
					@endif

				</div>
				<div class="navbar-collapse collapse">
					<form class="navbar-form navbar-right">
						@if (Auth::check()) 

							<button type="button" class="btn btn-success" onclick=location.href="{{ URL::to('/profile') }}"> Profile: {{ ucwords(Auth::user()->username) }}</button>
							<button type="button" class="btn btn-danger" onclick=location.href="{{ URL::to('/logout') }}">Logout</button>

						@else
							<button type="button" class="btn btn-success" onclick=location.href="{{ URL::to('/login') }}">Sign in</button>
							<button type="button" class="btn btn-success" onclick=location.href="{{ URL::to('#openlogin') }}">SignModal</button>
							<button type="button" class="btn btn-success" onclick=location.href="{{ URL::to('/register') }}">Register</button> 
							@include('home.loginmodal')
						
						@endif
						
					</form>
				</div><!--/.navbar-collapse -->
			</div>
		</div>

@show