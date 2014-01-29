@extends("master")

@section("content")

    <div class="span4 offset1">

            <div class="col-md-4 col-md-offset-3">

                <div class="well text-center">

                    <legend>Reset Password Request</legend>
                    {{ Form::open([
                        "route"        => "user/request",
                        "autocomplete" => "off"
                    ]) }}

                    <div class="rowpad">
                    {{ Form::label("email", "Email:") }}
                   
                    {{ Form::text("email", Input::get("email"), [
                        "placeholder" => "john@example.com"
                    ]) }}
                    </div>

                    {{ Form::submit("Send Reset Email", array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>

            </div>
    </div>
@stop
