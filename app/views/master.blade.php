<!DOCTYPE HTML>
<html lang="en">
	<head> 
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
		<meta name="viewport" content="width=device-width, inital-scale=1.0">
		<meta name="author" content="">

		<title>Tutorscout</title>

		<!-- Bootstrap core CSS -->
		<link href="assets/dist/css/bootstrap.css" rel="stylesheet">

		<!-- Custom styles for this template -->
		<!-- not sure what the jumbotron.css is supposed to do everytime i give it the right path
			 it adds a random white space above my nav-bar 
		<link href="assets/examples/jumbotron/jumbotron.css" rel="stylesheet"> -->
	
	</head>		
	<body>

		<div class="navbar navbar-inverse navbar fixed-top" role="navigation">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="/">|TutorScout Home|</a>
					<a class="navbar-brand" href="/aboutus">|About Us|</a>

				</div>
				<div class="navbar-collapse collapse">
					<form class="navbar-form navbar-right">
						<div class="form-group">
							<input type="text" placeholder="Email" class="form-control">
						</div>
						<div class="form-group">
							<input type="password" placeholder="Password" class="form-control">
						</div>
						<button type="submit" class="btn btn-success">Sign in</button>
						<button type="button" class="btn btn-success" onclick=location.href="http://www.tutorscout.com/register">Register</button>
					</form>
				</div><!--/.navbar-collapse -->
			</div>
		</div>

		<!-- Main  jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container">
				<h1>Welcome to TutorScout!</h1>
				<p>This is a simple template for demoing my Senior project with TutorScout</p>
			</div>
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
	<script src="assets/dist/js/bootstrap.min.js"></script>
</body>
</html>
