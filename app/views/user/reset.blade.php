@extends("master")

@section("content")

    <div class="span4 offset1">

        <div class="col-md-4">

            <div class="well">

                <legend>Reset Password</legend>
                {{ Form::open([
                    "url"          => URL::route("user/reset") . $token,
                    "autocomplete" => "off"
                ]) }}

                @if ($error = $errors->first("token"))
                <div class="error">
                    {{ $error }}
                </div>
                @endif

                <div class='rowpad'>
                    {{ Form::label("email", "Email") }}
                    {{ Form::text("email", Input::get("email"), [
                        "placeholder" => "john@example.com"
                    ]) }}
                </div>

                @if ($error = $errors->first("email"))
                <div class="error">
                    {{ $error }}
                </div>
                @endif

                <div class='rowpad'>
                    {{ Form::label("password", "Password") }}
                    {{ Form::password("password", [
                        "placeholder" => "••••••••••"
                    ]) }}
                </div>

                @if ($error = $errors->first("password"))
                <div class="error">
                    {{ $error }}
                </div>
                @endif

                <div class='rowpad'>
                    {{ Form::label("password_confirmation", "Confirm") }}
                    {{ Form::password("password_confirmation", [
                        "placeholder" => "••••••••••"
                    ]) }}
                </div>

                @if ($error = $errors->first("password_confirmation"))
                <div class="error">
                    {{ $error }}
                </div>
                @endif

                <div class='rowpad'>
                    {{ Form::submit("Reset", array('class' => 'btn btn-success')) }}
                    {{ Form::close() }}
                </div>
            </div>

        </div>

    </div>

@stop
