@extends('master')

@section('content')
	<!-- Google plus sign-in asynchronous javascript script -->
	<script type="text/javascript">
		(function() {
		var po = document.createElement('script'); po.type = 'text/javascript'; po.async = true;
		po.src = 'https://apis.google.com/js/client:plusone.js';
		var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(po, s);
		})();

		function signinCallback(authResult) {
			if (authResult['access_token']) {
				// Update the app to reflect a signed in user
				// Hide the sign-in button now that the user is authorized, for example:
				document.getElementById('signinButton').setAttribute('style', 'diplay: none');
			} else if (authResult['error']) {
				//	Update the app to reflect a signed out user
				//	possible error values:
				//		"user_sign_out" - User is signed-out
				//		"access_denid"  - User denied access to your app
				//		"immediate_failed" - Could not automatically log in the user
				console.log('Sign-in state: ' + authResult['error']);
			}
		}

		function disconnectUser(access_token) {
			var revokeUrl = 'https://accounts.google.com/o/oauth2/revoke?token=' + access_token;

			//Perform an asychronous GET request.
			$.ajax({
				type: 'GET',
				url: revokeUrl,
				async: false,
				contentType: "application/json",
				dataType: 'jsonp',
				success: function(nullResponse) {
					//Do something now that user is disconnected
					// The repsonse is always undefined.
				},
				error: function(e) { 
					// Handle the error
					// console.log(e);
					// You could point users to manually disconnect if unsuccessful
					// https://plus.google.com/apps
				}
			});
		}

		$('#revokeButton').click(disconnectUser);
	</script>
	<body>
		<span id="signinButton">
			<span
				class="g-signin"
				data-callback="signinCallback"
				data-clientid="5940012571.apps.googleusercontent.com"
				data-cookiepolicy="single_host_origin"
				data-requestvisibleactions="http://schemas.google.com/AddActivity"
				data-scope="https://www.googleapis.com/auth/plus.login">
			</span>
		</span>
		<p<a class="btn btn-default" button id="revokeButton" onclick="gapi.auth.signOut();" role="button">Sign Out</p>
	</body>

@stop