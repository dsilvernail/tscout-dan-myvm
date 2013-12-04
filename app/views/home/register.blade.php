@extends('master')

@section('content')

        <div class="span4 offset1">

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
                        {{ Form::text('username', '', array('placeholder' => 'username')) }}
                        <!-- This will be the value of the email text blank, which will be blank so we won't enter anything-->
                        {{ Form::text('email', '', array('placeholder' => 'Email')) }}
                        {{ Form::password('password', array('placeholder' => 'Password'))}}
                        {{ Form::submit('Register', array('class' => 'btn btn-success')) }}
                        <!-- btn class= btn-danger changes it to a red button -->
                        {{ HTML::link('/', 'Cancel', array('class' => 'btn btn-danger')) }}
                        {{ Form::close() }}
                </div>

        </div>

</div>

@stop
