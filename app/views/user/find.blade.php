@extends('master')

@section('content')

        <div class="row findusers">
                <div class="span12">
                        <h3>You can find your friends here</h3>
                </div>
        </div>

        <div class="row findusers">
                <div class="span6 offset3">
                        {{ Form::open(array('url' => 'findusers', 'method' => 'POST', 'class' => 'form-search')) }}
                        {{ Form::token() }}
                        <div class="input-prepend">
                                <span class="add-on">@</span>
                        {{ Form::text('username', Input::old('username'), array('placeholder' => 'johndoe', 'class' => 'input-large search-query')) }}
                        </div>
                        {{ Form::submit('Search', array('class' => 'btn btn-large')) }}
                        {{ Form::close() }}
                </div>
        </div>

        @if(!is_null($users))
        <div class="row findusers result">
                <div class="span8 offset2">
                        <table class="table table-striped table-bordered table-hover">
                                <thead>
                                        <tr>
                                                <th>Users</th>
                                                <th class="span2">&nbsp;</th>
                                        </tr>
                                </thead>
                                <tbody>
                                        @if(!count($users))
                                        <tr>
                                                <td colspan="2">
                                                        No results
                                                </td>
                                        </tr>
                                        @else
                                                @foreach($users as $user)
                                                <tr>
                                                        @if(in_array($user->id, $friends_id))
                                                                
                                                                <td onclick=location.href="{{ route('profiles.show', ['profiles' => $user->id]) }}">{{$user->username}}</td>

                                                                <td>

                                                                        {{ Form::open(array('action' => array('FollowController@destroyFollow', $user->id))) }}

                                                                        {{ Form::submit('Unfollow', array('class' => 'btn btn-block btn-danger')) }}

                                                                        {{ Form::close() }}

                                                                </td>

                                                        @else
                                                                <td>{{$user->username}}</td>

                                                                <td>  
                                                                        {{ Form::open(array('action' => array('FollowController@postFollow', $user->id))) }}

                                                                        {{ Form::submit('Follow', array('class' => 'btn btn-block btn-success')) }}

                                                                        {{ Form::close() }}
                                                                </td>
                                                        @endif
                                                
                                                </tr>
                                                @endforeach
                                        @endif
                                </tbody>
                        </table>
                </div>
        </div>
        
        @endif

@stop