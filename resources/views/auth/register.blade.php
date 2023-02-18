@extends('layouts.index')

@push('css')
    <style>
        .error {
            color: red;
        }
    </style>
@endpush

@section('content')
    <section id="product-detail">
        <div class="container">
            <div class="col-md-3 col-sm-3 hidden-xs"></div>
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="products-wrap">
                    <div class="accordion accordion-lg divcenter nobottommargin clearfix" style="max-width: 550px;">
                        <div id="register">
                            <div class="acctitle acctitlec">Đăng ký tài khoản</div>
                            @if(session()->has('success'))
                                <h4 style="color:green;">{{ session()->get('success') }}</h4>
                            @endif
                            <div class="acc_content clearfix" style="display: block;">
                                <form action="{{ route('register') }}" id="customer_register" method="post">
                                    @csrf
                                    <div class="col_full">
                                        <label for="first_name">Tên đăng nhập:<span
                                                class="require_symbol">*</span></label>
                                        <input type="text" id="first_name" name="name" value="" class="form-control"
                                               placeholder="Tên đăng nhập">
                                        @error('name')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col_full">
                                        <label for="register-form-password">Mật khẩu:<span
                                                class="require_symbol">*</span></label>
                                        <input type="password" id="register-form-password" name="password"
                                               placeholder="Mật khẩu" class="form-control">
                                        @error('password')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col_full">
                                        <label for="register-form-repassword">Nhập lại mật khẩu:<span
                                                class="require_symbol">* </span></label>
                                        <input type="password" id="register-form-repassword"
                                               name="password_confirmation" value=""
                                               class="form-control" placeholder="Nhập lại mật khẩu">
                                        @error('password-confirmation')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col_full">
                                        <label for="first_name">Họ tên:<span class="require_symbol">*</span></label>
                                        <input type="text" id="first_name" name="fullname" placeholder="Họ tên"
                                               class="form-control">
                                        @error('fullname')
                                        <div class="error">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col_full">
                                        <label for="register-form-email">Email:<span
                                                class="require_symbol">*</span></label>
                                        <input type="email" id="register-form-email" name="email" class="form-control"
                                               placeholder="Nhập email">
                                        @error('email')
                                        <div class="error" >{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col_full">
                                        <label for="first_name">Số điện thoại:<span
                                                class="require_symbol">*</span></label>
                                        <input type="text" id="first_name" name="phone" placeholder="Số điện thoại"
                                               class="form-control">
                                        @error('phone')
                                        <div class="error" >{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col_full nobottommargin">
                                        <button type="submit" class="button button-3d button-black nomargin"
                                                style="margin-bottom: 20px">
                                            Đăng
                                            ký
                                        </button>
                                        <ul>
                                            <li class="right" style="font-size: 18px;">Nếu đã có tài khoản, hãy <a
                                                    href="dang-nhap" style="font-size: 19px; color: #0f9ed8;">Đăng
                                                    nhập</a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-3 col-sm-3 hidden-xs"></div>
        </div>
    </section>
@endsection
