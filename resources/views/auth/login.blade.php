<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="https://code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/starlight.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css"/>


</head>
<body>

<div class="d-flex align-items-center justify-content-center bg-sl-primary ht-100v">

    <div class="login-wrapper wd-300 wd-xs-350 pd-25 pd-xs-40 bg-white">
        <div class="signin-logo tx-center tx-24 tx-bold tx-inverse"><span class="tx-info tx-normal">{{env('APP_NAME')}}</span>
        </div>
        <div class="tx-center mg-b-60">und die Konkurrenz steht im Schatten
</div>

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="form-group">
                <input id="email" type="email"
                       class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email"
                       value="{{ old('email') }}" placeholder="Deine Email" required autofocus>

                @if ($errors->has('email'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                @endif
            </div>

            <div class="form-group">
                <input id="password" type="password"
                       class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
                       placeholder="Dein Passwort" name="password" required>

                @if ($errors->has('password'))
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                @endif
                <a href="{{ route('password.request') }}" class="tx-info tx-12 d-block mg-t-10">Passwort vergessen?</a>
            </div>

            <div class="form-group">
                <label class="ckbox">
                    <input type="checkbox" id="remember"
                           name="remember" {{ old('remember') ? 'checked' : '' }}><span>Login speichern</span>
                </label>
            </div>

            <button type="submit" class="btn btn-info btn-block">Anmelden</button>
            <div class="pt-4 tx-center-force">
                <a href="{{route('oauth.google.login')}}" class="btn btn-outline-danger btn-icon rounded-circle mg-r-5">
                    <div><i class="fa fa-google-plus"></i></div>
                </a>
                <a href="{{route('oauth.twitter.login')}}" class="btn btn-outline-info btn-icon rounded-circle mg-r-5">
                    <div><i class="fa fa-twitter"></i></div>
                </a>
            </div>
            <div class="mg-t-60 tx-center">Noch kein Konto? <a href="{{route('register')}}"
                                                               class="tx-info">Registrieren</a>
            </div>
        </form>
    </div><!-- login-wrapper -->
</div><!-- d-flex -->

<script src="{{asset('assets/lib/jquery/jquery.js')}}"></script>
<script src="{{asset('assets/lib/popper.js/popper.js')}}"></script>
<script src="{{asset('assets/lib/bootstrap/bootstrap.js')}}"></script>

</body>
</html>