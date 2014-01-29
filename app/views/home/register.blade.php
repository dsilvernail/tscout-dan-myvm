@extends('master')

@section('content')
        @include('jumbotron')
        
        <div class="span4 offset1">
            
                <div class="col-md-4">

                        <div class="well">
                                <legend>Please Register</legend>
                                <!--This will open up the login in form and we will open it at the url 'login'-->
                                {{ Form::open(array('url' => 'register')) }}
                                <!--This will handle any errors that we get - if there are any errors we will return it with a class alert alert.error-->
                                @if($errors->any())
                                <div class="alert alert-error">
                                        <!--Shortcut for 'times'-->
                                        <a href="#" class="close" data-dismiss="alert">&times;</a>
                                        {{ implode('', $errors->all('<li class="error">:message</li>')) }}
                                </div>
                                @endif

                                <div class="rowpad">
                                        {{ Form::text('username', '', array('placeholder' => 'username')) }}
                                </div>

                                <div class="rowpad">
                                <!-- This will be the value of the email text blank, which will be blank so we won't enter anything-->
                                        {{ Form::text('email', '', array('placeholder' => 'Email')) }}
                                </div>

                                <div class="rowpad">
                                        {{ Form::password('password', array('placeholder' => 'Password')) }}
                                </div>

                                <div class="rowpad">
                                        {{ Form::password('password_confirmation', array('placeholder' => 'Confirm Password')) }}
                                </div>

                                <div class="rowpad">
                                        {{ Form::submit('Register', array('class' => 'btn btn-success')) }}
                                </div>

                                <div class="rowpad">
                                        <!-- btn class= btn-danger changes it to a red button -->
                                        {{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
                                        {{ Form::close() }}
                                </div>
                        </div>
                </div>

                <div class="col-md-8">
                        <h1>JOIN THE TUTORSCOUT NETWORK!!</h1>
                        <h3>
                               Why you should join!!
                        </h3>
                </div>
        </div>

@stop
