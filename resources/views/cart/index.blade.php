@extends('layouts.index')

@section('content')
    <div class="row content-cart">
        <div class="container">
            @if(session()->has('cart'))
                    <?php
                    $cart = session()->get('cart'); ?>
                <form action="" method="post" id="cartformpage">
                    <div class="cart-index">
                        <h2>Chi tiết giỏ hàng</h2>
                        <div class="tbody text-center">
                            <div class="col-xs-12 col-12 col-sm-12 col-md-8 col-lg-8">

                                <table class="table table-list-product">

                                    <thead>
                                    <tr style="background: #f3f3f3;">
                                        <th>Hình ảnh</th>
                                        <th>Tên sản phẩm</th>
                                        <th class="text-center">Đơn giá</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-center">Thành tiền</th>
                                        <th class="text-center">Xóa</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $total_price = 0; ?>
                                    @foreach((array)$cart as $index => $detail)
                                            <?php
                                            $total_price += $detail['price'] * $detail['quantity']; ?>
                                        <tr>
                                            <td class="img-product-cart">
                                                <a href="">
                                                    <img src="{{asset('storage/upload' . '/' . $detail['avatar'])}}" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <a href="" class="pull-left">{{$detail['name']}}</a>
                                            </td>
                                            <td>
                                        <span class="amount">
                                            @if($detail['price'] > 0)
                                                {{number_format($detail['price'])}} VNĐ
                                            @endif
                                        </span>
                                            </td>
                                            <td>
                                                <div class="quantity clearfix">
                                                    <input name="quantity" id="{{$index}}" class="form-control"
                                                           type="number" value="{{$detail['quantity']}}" min="1"
                                                           max="1000" onchange="onChangeSL({{$detail['quantity']}})">
                                                </div>
                                            </td>
                                            <td>
                                        <span class="amount">
                                            @if($detail['price'] > 0)
                                                {{number_format($detail['price'] * $detail['quantity'])}} VNĐ
                                            @endif
                                        </span>
                                            </td>
                                            <td>
                                                <a class="remove" title="Xóa" onclick="onRemoveProduct({{$index}})"><i
                                                        class="fas fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                                <button class="btn" onclick="window.location.href='san-pham'"><a href="">Tiếp tục mua
                                        hàng</a></button>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-4">
                                <div class="clearfix btn-submit" style="padding-left: 10px;margin-top: 20px;">
                                    <table class="table total-price" style="border: 1px solid #ececec;">
                                        <tbody>
                                        <tr style="background: #f4f4f4;">
                                            <td>Tổng tiền</td>
                                            <td><strong><?php
                                                            echo (number_format($total_price)).' VNĐ'; ?></strong></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><h5>Mua hàng trực tiếp tại cửa hàng giảm giá 5%</h5></td>
                                        </tr>
                                        <tr>
                                            <td colspan="2"><h5>Nếu đặt online Bạn hãy đồng ý với điều khoản sử dụng &
                                                    hướng dẫn hoàn trả.</h5></td>
                                        </tr>

                                        <tr>

                                            <td colspan="2">
                                                <button type="button" onclick="window.location.href='info-order'"
                                                        class="btn-next-checkout">Đặt hàng
                                                </button>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @else
                <div class="cart-info">
                    Chưa có sản phẩm nào trong giỏ hàng !
                    <br>
                    <button class="btn" onclick="window.location.href='san-pham'"> Tiếp tục mua hàng</button>
                </div>

            @endif
        </div>
    </div>
@endsection


@push('js')
    <script>
        function onChangeSL(id) {
            {{--var sl = document.getElementById(id).value;--}}
            {{--var strurl = "<?php--}}
            {{--              echo base_url(); ?>" + '/sanpham/update';--}}
            {{--jQuery.ajax({--}}
            {{--    url: strurl,--}}
            {{--    type: 'POST',--}}
            {{--    dataType: 'json',--}}
            {{--    data: {id: id, sl: sl},--}}
            {{--    success: function (data) {--}}
            {{--        document.location.reload(true);--}}
            {{--    }--}}
            {{--});--}}
        }

        function onRemoveProduct(id) {
            {{--var strurl = "<?php--}}
            {{--              echo base_url(); ?>" + '/sanpham/remove';--}}
            {{--jQuery.ajax({--}}
            {{--    url: strurl,--}}
            {{--    type: 'POST',--}}
            {{--    dataType: 'json',--}}
            {{--    data: {id: id},--}}
            {{--    success: function (data) {--}}
            {{--        document.location.reload(true);--}}
            {{--        alert('Xóa sản phẩm thành công !!');--}}
            {{--    }--}}
            {{--});--}}
        }
    </script>
@endpush


