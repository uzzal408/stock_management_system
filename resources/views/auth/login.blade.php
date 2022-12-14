<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/main.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('backend/css/font-awesome/4.7.0/css/font-awesome.min.css') }}"/>
    <title>Login - {{ 'Stock Management System'  }}</title>
</head>
<body>
<section class="material-half-bg">
    <div class="cover"></div>
</section>
<section class="login-content">
    <div class="logo">
        <h1>{{ 'Stock Management System ! Admin' }}</h1>
    </div>
    <div class="login-box">
        <form class="login-form" action="{{ route('login') }}" method="POST" role="form">
            @csrf
            <h3 class="login-head"><i class="fa fa-lg fa-fw fa-user"></i>SIGN IN</h3>
            <div class="form-group">
                <label class="control-label" for="email">Email Address</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="Email address" autofocus value="{{ old('email') }}">
                @error('email')
                <span class="invalid-feedback" role="alert">
{{--                    <strong>{{ $message }}</strong>--}}
                </span>
                @enderror
            </div>
            <div class="form-group">
                <label class="control-label" for="password">Password</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="Password">
            </div>
            <div class="form-group">
                <div class="utility">
                    <div class="animated-checkbox">
                        <label>
                            <input type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}><span class="label-text">Stay Signed in</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="form-group btn-container">
                <button class="btn btn-primary btn-block" type="submit"><i class="fa fa-sign-in fa-lg fa-fw"></i>SIGN IN</button>
            </div>
        </form>
    </div>
</section>
{{--<script src="{{ asset('public/backend/js/jquery-3.2.1.min.js') }}"></script>--}}
{{--<script src="{{ asset('public/backend/js/popper.min.js') }}"></script>--}}
<script src="{{ asset('public/backend/js/bootstrap.min.js') }}"></script>
{{--<script src="{{ asset('public/backend/js/main.js') }}"></script>--}}
{{--<script src="{{ asset('public/backend/js/plugins/pace.min.js') }}"></script>--}}
<script>
    console.log('%c Developed By Ismail Hossen, ', 'background: #000; font-weight:500; color: #fff');
</script>
</body>
</html>

