@section('activities')
		<script src="http://js.pusher.com/2.1/pusher.min.js" type="text/javascript"></script>
		
		<script type="text/javascript"> 
			var pusher = new Pusher('88f8c864a13f0441b7cc');

			var channel = pusher.subscribe('my-channel');

			channel.bind('my-event', function(data) {
  				alert('An event was triggered with message: ' + data.message);
			});
		</script> 
@show