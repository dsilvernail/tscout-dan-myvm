<!DOCTYPE HTML>
<html lang="en">
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<meta name="author" content="">

		<title>Tutorscout</title>

		<!-- Bootstrap core CSS -->
		<link href= "{{ URL::to('assets/dist/css/bootstrap.css') }}" rel="stylesheet">

		<!-- Custom styles for this template -->
		<!-- not sure what the jumbotron.css is supposed to do everytime i give it the right path
			 it adds a random white space above my nav-bar 
		<link href="assets/examples/jumbotron/jumbotron.css" rel="stylesheet"> -->
	
	</head>		
	<body>
		@include('navbar')

		<div class="container">
      		@if(Session::has('message'))
         		<p class="alert">{{ Session::get('message') }}</p>
      		@endif
    	</div>

	<div class="container">
		@yield('content')

	
	</div> <!-- /container -->
	<div class="container">
		<hr>

		<footer>
			<p>JMU Senior Capstone 2013-14</p>
		</footer>
	</div>
	<!-- Bootstrap core JavaScript
	=========================================================== -->
	<!-- Placed at end of the document so the pages load faster -->
	
	<script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
	<script src="http://www.tutorscout.com/assets/dist/js/bootstrap.min.js"></script>
	<script src="http://js.pusher.com/2.1/pusher.min.js"></script>
	<script src="{{URL::to('assets/dist/js/app.js')}}"></script>
	
</body>
</html>
