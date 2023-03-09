@extends('layouts.index')

@section('content')
    <section id="product-all" class="collection">
        <div class="banner-product">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                    <img src="{{asset('/assets/images/sp.png')}}">
                </div>
            </div>
        </div>
        <div class="slider">
            <div class="container">
                <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3">
                    <div class="list-menu pull-left col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        @include('product.category')
                    </div>
                    @include('product.sale')
                </div>
                <div class="col-xs-12 col-sm-12 col-md-9 col-lg-9 product-content">
                    <div class="product-wrap">
                        <div class="collection__title">
                            <h1><span></span></h1>
                            <div id="sort-by" class="hidden-xs">
                                <label class="left hidden-xs" for="sort-select">Sắp xếp theo: </label>
                                <form class="form-inline form-viewpro">
                                    <div class="form-group">
                                        <select id ="sortControl" class = "form-control input-sm" onchange="sortby(this.value)">
                                            <option value="number_buy-desc" selected>Bán chạy nhất</option>
                                            <option value="number_buy-desc">Bán chạy nhất</option>
                                            <option value="name-asc" selected>A → Z</option>
                                            <option value="name-asc" >A → Z</option>
                                            <option value="name-desc" selected>Z → A</option>
                                            <option value="name-desc">Z → A</option>
                                            <option value="price-asc" selected>Giá tăng dần</option>
                                            <option value="price-asc">Giá tăng dần</option>
                                            <option value="price-desc" selected>Giá giảm dần</option>
                                            <option value="price-desc">Giá giảm dần</option>
                                            <option value="created-desc" selected>Hàng mới nhất</option>
                                            <option value="created-asc" selected>Hàng cũ nhất</option>
                                            <option value="created-asc">Hàng cũ nhất</option>
                                            {{--                                        <option value="number_buy-desc">Bán chạy nhất</option>=--}}
                                            {{--                                        <option value="name-asc">A → Z</option>=--}}
                                            {{--                                        <option value="name-desc">Z → A</option>=--}}
                                            {{--                                        <option value="price-asc">Giá tăng dần</option>=--}}
                                            {{--                                        <option value="price-desc">Giá giảm dần</option>=--}}
                                            {{--                                        <option value="created-desc">Hàng mới nhất</option>=--}}
                                            {{--                                        <option value="created-asc">Hàng cũ nhất</option>=--}}
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="collection-filter" id = "list-product">
                                <div class="category-products clearfix">
                                    <div class="products-grid clearfix">
                                        @if(empty($products))
                                            <p class="no-products"> Danh mục hiện chưa có sản phẩm nào !</p>
                                        @else
                                            @foreach($products as $product)
                                                <div class="col-md-3 col-lg-3 col-xs-6 col-6">
                                            <div class="product-lt">
                                                <div class="lt-product-group-image">
                                                    <a href="" title="" >
                                                        <img class="img-p"src="{{asset('storage/upload' . '/' . data_get($product, 'avatar'))}}" alt="">
                                                    </a>

                                                    <div class="giam-percent">
                                                        <span class="text-giam-percent">Giảm {{data_get($product, 'sale')}} %</span>
                                                    </div>
                                                </div>

                                                <div class="lt-product-group-info">
                                                    <a href="" title="">
                                                        <h3>{{data_get($product, 'name')}}</h3>
                                                    </a>
                                                    <div class="price-box">
                                                        <p class="old-price">
                                                            <span class="price">{{data_get($product, 'price')}}₫</span>
                                                        </p>
                                                        <p class="special-price">
                                                            <span class="price">{{data_get($product, 'price_sale')}}₫</span>
                                                        </p>
{{--                                                        <p class="old-price">--}}
{{--                                                            <span class="price" style="color: #fff">₫</span>--}}
{{--                                                        </p>--}}
{{--                                                        <p class="special-price">--}}
{{--                                                            <span class="price">₫</span>--}}
{{--                                                        </p>--}}


                                                    </div>
                                                    <div class="clear"></div>
                                                </div>
                                            </div>
                                        </div>
                                            @endforeach
                                        @endif
                                    </div>
                                    <div class = "text-center pull-right">
                                        <ul class ="pagination">
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@push('js')
    <script type="text/javascript">
        function sortby(option){
            {{--var strurl="<?php echo base_url();?>"+'/sanpham/category';--}}
            {{--jQuery.ajax({--}}
            {{--    url: strurl,--}}
            {{--    type: 'POST',--}}
            {{--    dataType: 'json',--}}
            {{--    data: {'sapxep-category': option},--}}
            {{--    success: function(data) {--}}
            {{--        $('#list-product').html(data);--}}
            {{--    },error: (error) => {--}}
            {{--        console.log(JSON.stringify(error));--}}
            {{--    }--}}
            {{--});--}}
        }
    </script>
@endpush


