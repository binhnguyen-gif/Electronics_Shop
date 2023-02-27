@extends('layouts.index')

@section('content')
    <section id="menu-slider">
        <div class="slider">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 list-menu pull-left" style="height: 321px;">
                    <img style="width: 100%; height: 160px;" src="{{asset('assets/images/Right-banner.png')}}">
                    <img style="width: 100%; height: 160px;" src="{{asset('assets/images/banner2.png')}}">
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 slider-main pull-left">
                    <div class="owl-carousel-slider owl-carousel owl-theme">
                        @foreach($sliders as $slider)
                            <div class="item"><img src="{{ asset('storage') . '/upload/' . data_get($slider, 'img') }}"
                                                   alt="{{data_get($slider, 'name')}}"></div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 20px;">
            <div class="sale-title">
                <span>SẢN PHẨM KHUYẾN MÃI HOT</span>
            </div>
        </div>
        <div class="container" style="margin-bottom: 20px;">
                <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #0f9ed8;">
                    @foreach($products as $product)
                    <div class="item" style="margin: 0px;">
                        <div class="products-sale">
                            <div class="lt-product-group-image">
                                <a href="" title="">
                                    <img class="img-p"
                                         src="{{asset('storage/upload') . '/' . data_get($product,'avatar')}}" alt="">
                                </a>
                                <div class="giam-percent">
                                    <span class="text-giam-percent">Giảm {{data_get($product, 'sale')}}%</span>
                                </div>
                            </div>
                            <div class="lt-product-group-info">
                                <a href="" title="" style="text-align: left;">
                                    <h3>{{data_get($product, 'name')}}</h3>
                                </a>
                                <div class="price-box">
                                    <p class="old-price">
                                        <span class="price">{{data_get($product, 'price')}}₫</span>
                                    </p>
                                    <p class="special-price">
                                        <span class="price">{{data_get($product, 'price_sale')}}₫</span>
                                    </p>
                                    <p class="old-price">
                                        <span class="price" style="color: #fff">₫</span>
                                    </p>
                                    <p class="special-price">
                                        <span class="price">₫</span>
                                    </p>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
        </div>

        <div class="container" style="margin-top: 20px;">
            <div class="sale-title">
                <span>SẢN PHẨM BÁN CHẠY</span>
            </div>
        </div>
        <div class="container" style="margin-bottom: 20px;">
            <div class="owl-carousel owl-carousel-product owl-theme" style="border: 1px solid #0f9ed8;">
                @foreach($products as $product)
                <div class="item" style="margin: 0px;">
                    <div class="products-sale">
                        <div class="lt-product-group-image">
                            <a href="" title="">
                                <img class="img-p" src="public/images/products" alt="">
                            </a>

                            <div class="giam-percent">
                                <span class="text-giam-percent">Giảm %</span>
                            </div>

                        </div>
                        <div class="lt-product-group-info">
                            <a href="" title="" style="text-align: left;">
                                <h3></h3>
                            </a>
                            <div class="price-box">


                                <p class="old-price">
                                    <span class="price">₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price">₫</span>
                                </p>

                                <p class="old-price">
                                    <span class="price" style="color: #fff">₫</span>
                                </p>
                                <p class="special-price">
                                    <span class="price">₫</span>
                                </p>

                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>

    </section>
    <div id="content">
{{--        <div class="container">--}}
{{--            <div class="list-product">--}}
{{--                <div class="list-header-z">--}}
{{--                    <h2><a href=""> nổi bật</a></h2>--}}
{{--                    <ul class="sub-category">--}}

{{--                        <li>--}}
{{--                            <a href="san-pham/"--}}
{{--                               title=""--}}
{{--                               class="ws-nw overflow ellipsis"--}}
{{--                            >--}}

{{--                            </a>--}}
{{--                        </li>--}}

{{--                    </ul>--}}
{{--                </div>--}}
{{--                <div class="product-container">--}}

{{--                    <div class="p-box-5">--}}
{{--                        <div class="product-lt">--}}
{{--                            <div class="lt-product-group-image">--}}
{{--                                <a href="" title="">--}}
{{--                                    <img class="img-p" src="public/images/products/" alt="">--}}
{{--                                </a>--}}


{{--                                <div class="giam-percent">--}}
{{--                                    <span class="text-giam-percent">Giảm %</span>--}}
{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="lt-product-group-info">--}}
{{--                                <a href="" title="" style="text-align: left;">--}}
{{--                                    <h3></h3>--}}
{{--                                </a>--}}
{{--                                <div class="price-box">--}}


{{--                                    <p class="old-price">--}}
{{--                                        <span class="price">₫</span>--}}
{{--                                    </p>--}}
{{--                                    <p class="special-price">--}}
{{--                                        <span class="price">₫</span>--}}
{{--                                    </p>--}}

{{--                                    <p class="old-price">--}}
{{--                                        <span class="price" style="color: #fff">₫</span>--}}
{{--                                    </p>--}}
{{--                                    <p class="special-price">--}}
{{--                                        <span class="price">₫</span>--}}
{{--                                    </p>--}}

{{--                                </div>--}}
{{--                                <div class="clear"></div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
    </div>

    <div class="home-blog">
        <div class="container">
            <div class="row-p">
                <div class="text-center">
                    <h2 class="sectin-title title title-blue">Tin tức công nghệ</h2>
                </div>
            </div>
            <div class="blog-content">

                <div class="col-xs-12 col-12 col-sm-6 col-md-4 col-lg-4" style="margin: 5px;">
                    <div class="latest">
                        <a href="tin-tuc/">
                            <div class="tempvideo">
                                <img width="98%" src="public/images/posts/">
                            </div>
                            <h3 style="color: #999;"></h3>
                        </a>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="adv">
        <section id="service" style="margin: 20px;">
            <div class="container">
                <div class="row">
                    <div id="service_home" class="clearfix">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                            <div class="service_item">
                                <div class="icon icon_product">
                                    <img src="public/images/icon_142e7.png" alt="">
                                </div>
                                <div class="description_icon">
                                <span class="large-text">
                                    Miễn phí giao hàng
                                </span>
                                    <span class="small-text">
                                    Cho hóa đơn từ 100,000,000 đ
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                            <div class="service_item">
                                <div class="icon icon_product">
                                    <img src="public/images/icon_242e7.png" alt="">
                                </div>
                                <div class="description_icon">
                                <span class="large-text">
                                    Giao hàng trong ngày
                                </span>
                                    <span class="small-text">
                                    Với tất cả đơn hàng
                                </span>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12 text-center m-b-xs-10">
                            <div class="service_item">
                                <div class="icon icon_product">
                                    <img src="public/images/icon_342e7.png" alt="">
                                </div>
                                <div class="description_icon">
                                <span class="large-text">
                                    Sản phẩm an toàn
                                </span>
                                    <span class="small-text">
                                    Cam kết chính hãng
                                </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--Begin-->
        <!--End-->
    </div>

@endsection
{{--<div class="container">--}}
{{--    <div class="row justify-content-center">--}}
{{--        <div class="col-md-8">--}}
{{--            <div class="card">--}}
{{--                <div class="card-header">{{ __('Dashboard') }}</div>--}}

{{--                <div class="card-body">--}}
{{--                    @if (session('status'))--}}
{{--                        <div class="alert alert-success" role="alert">--}}
{{--                            {{ session('status') }}--}}
{{--                        </div>--}}
{{--                    @endif--}}

{{--                    {{ __('You are logged in!') }}--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
{{--</div>--}}
