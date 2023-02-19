@extends('layouts.index')

@section('content')
    <div class="container">
        <div class="products-wrap">
            <div class="container">
                <div class="col-md-3 col-sm-3 hidden-xs"></div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="login">
                        <div class="acctitle acctitlec">Đăng nhập</div>
                        <div class="acc_content clearfix" style="display: block;">
                            <form action="{{ route('login') }}" id="customer_login" method="post">
                                @csrf
                                <div class="col_full">
                                    <label for="login-form-username">Tài khoản:<span
                                            class="require_symbol">* </span></label>
                                    <input type="text" name="name" value="" class="form-control">
                                    @error('name')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col_full">
                                    <label for="login-form-password">Mật khẩu:<span
                                            class="require_symbol">* </span></label>
                                    <input type="password" name="password" value="" class="form-control">
                                    @error('password')
                                    <div class="error">{{ $message }}</div>
                                    @enderror
                                </div>
                                @if($errors->any())
                                    <div class="row">
                                        <p style='color:red;'>{{ $errors->first() }}</p>
                                    </div>
                                @endif
                                <div class="col_full nobottommargin">
                                    <button class="button button-3d button-black nomargin pull-left"
                                            type="submit" value="login">Đăng nhập
                                    </button>
                                    <ul class="pull-right">
                                        <li><a href="quen-mat-khau" class="fright">Quên mật khẩu?</a></li>
                                        <li><a href="dang-ky" class="fright">Người dùng mới? Đăng ký
                                                tài khoản</a></li>
                                    </ul>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-3 hidden-xs"></div>
            </div>
        </div>
    </div
@endsection
