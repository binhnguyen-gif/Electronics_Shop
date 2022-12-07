<html lang="">
    <head>
        <base href=""></base>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Hệ thống quản lý cơ sở dữ liệu</title>
        <link rel="shortcut icon" href="{{ asset('assets/images/templates/favicon.png') }}"/>
        <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/login.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/font-awesome.min.css') }}">
    </head>
    <body>
        <div class="container khung">
            <div class="title">
                <h2 class="text-center" style="color:#337ab7">Smart Store</h2>
            </div>
            <hr>
            <div class="myform">
                <form method="POST" action="{{ route('login') }}" role="form">
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                           <input type="text" name="username" class="form-control" placeholder="Tên đăng nhập">
                          
                        </div>
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="row form-row">
                        <div class="input-group">
                           <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                           <input type="password" name="password" class="form-control" placeholder="Mật khẩu">
                          
                        </div>
                        <div class="error" id="password_error"></div>
                    </div>
                    <div class="row form-row" style="width:100%; margin-top: 15px;">
                        <button type="submit" class="form-control btn btn-primary btn-login">Đăng nhập</button>
                    </div>
                        <div class="row">
                            <div class="alert alert-danger">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>
                </form>
            </div>
            <hr>
        </div>
        <nav class="navbar navbar-fixed-bottom" role="navigation">
            <div class="container">
               <h5 class="text-center">Copyright © 2022 <a href="#" style="color:red">Smart-Store</a>. All rights reserved.</h5>
            </div>
        </nav>
        <!-- jQuery -->
        <script src="{{ asset('assets/js/jquery-2.2.3.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
    
    </body>
</html>


{{-- 
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> --}}