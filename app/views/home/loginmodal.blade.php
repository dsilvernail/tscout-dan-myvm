@section('loginmodal')
	
	<link href="assets/dist/css/webdepotmodal.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="assets/dist/js/bootstrap.min.js"></script>

	 <div id="openlogin" class="modalDialog">
		<div>
			<a href="#close" title="Close" class="close">X</a>


                	<div class="well">
                        	<legend>Please Login</legend>
                        	<!--This will open up the login in form and we will open it at the url 'login'-->
                        	{{ Form::open(array('url' => '/#openlogin')) }}
                        	<!--This will handle any errors that we get - if there are any errors we will return it with a class alert alert.error-->
                        	@if($errors->any())
                            	<div class="alert alert-error">
                                	<!--Shortcut for 'times'-->
                                	<a href="#" class="close" data-dismiss="alert">&times;</a>
                                	{{ implode('', $errors->all('<li class="error">:message</li>')) }}
                            	</div>
                        	@endif

                         	<div class="rowpad">
                        	<!-- This will be the value of the email text blank, which will be blank so we won't enter anything-->
                            	{{ Form::text('email', '', array('placeholder' => 'Email')) }}
                        	</div>

                        	<div class="rowpad">
                            	{{ Form::password('password', array('placeholder' => 'Password'))}}
                        	</div>

                        	<div class="rowpad">
                            	{{ Form::submit('Login', array('class' => 'btn btn-success')) }}
                                {{ Form::close() }}
                        	</div>

                        	<div class="rowpad">
                            	{{ HTML::link('register', 'Register', array('class' => 'btn btn-primary')) }}
                            
                        	</div>

                	</div>

            		<div class="well">
                		<legend>Or sign in with:</legend>
                
               			<div class="rowpad">
                		{{ HTML::link('google', 'Google', array('class' => 'btn btn-danger')) }}

                		{{ HTML::link('facebook', 'Facebook', array('class' => 'btn btn-primary')) }}
                
                		{{ Form::close() }}            
                		</div>

            		</div>

        		</div>
        
    		</div>

    	</div>

    </div>

@show