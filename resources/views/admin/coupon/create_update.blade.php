@extends("admin.layouts.app")

@php
    $isUpdate = isset($id) ? true : false;
    $route = isset($id) ? route('admin.coupon.update', ['id' => $id]) : route('admin.coupon.store');
@endphp

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i> Thêm mã giảm giá mới</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="javascript:void(0);"
           onclick="event.preventDefault();document.getElementById('coupon-form').submit();" role="button">
            <span class="glyphicon glyphicon-plus"></span>[Lưu]
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.coupon.index') }}" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thoát
        </a>
    </div>
@endsection

@section('content')
    <form action="{{$route}}" method="POST" id="coupon-form">
        @csrf
        @if($isUpdate)
            @method('PUT')
        @endif
        <section class="content">
            @if(session()->has('success'))
                <div class="alert alert-success">
                    {{session()->get('success')}}
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                </div>
            @endif
            @if(session()->has('error'))
                <div class="row">
                    <div class="alert alert-success">
                        {{session()->get('error')}}
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                        </button>
                    </div>
                </div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Mã giảm giá</label>
                                    <input type="text" class="form-control" name="code" value="{{$isUpdate ? data_get($coupon, 'code') : old('code')}}" style="width:100%"
                                           placeholder="Mã giảm giá">
                                    <div class="error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số tiền giảm giá</label>
                                    <input type="number" class="form-control" name="discount" value="{{$isUpdate ? data_get($coupon, 'discount') : old('discount')}}" style="width:100%"
                                           placeholder="Số tiền giảm giá">
                                    <div class="error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số lần giới hạn nhập</label>
                                    <input type="number" class="form-control" name="limit_number" value="{{$isUpdate ? data_get($coupon, 'limit_number') : old('limit_number')}}" style="width:100%"
                                           placeholder="Số lần giới hạn nhập">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số tiền đơn hàng tối thiểu được áp dụng</label>
                                    <input type="number" class="form-control" name="payment_limit" value="{{$isUpdate ? data_get($coupon, 'payment_limit') : old('payment_limit')}}" style="width:100%"
                                           placeholder="Đơn hàng tối thiểu được áp dụng">
                                    <div class="error" id="password_error"></div>
                                </div>
                                @if($isUpdate)
                                    <div class="form-group">
                                        <label>Số lần đã nhập</label>
                                        <input type="number" class="form-control" name="number_used" style="width:100%" value="{{data_get($coupon, 'number_used')}}" disabled="">
                                        <div class="error" id="password_error"></div>
                                    </div>
                                    <div class="form-group">
                                        <label>Số lần còn lại</label>
                                        <input type="text" class="form-control" style="width:100%" placeholder="Số lần giới hạn nhập" value="{{data_get($coupon, 'limit_number') - data_get($coupon, 'number_used')}}" disabled="">
                                    </div>
                                @endif
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Ngày giới hạn nhập</label>
                                    <div class="form-group">
                                        <input type="date" style="width:100%" name="expiration_date" value="{{$isUpdate ? data_get($coupon, 'expiration_date') : old('expiration_date')}}" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="description" class="form-control">{{$isUpdate ? data_get($coupon, 'description') : old('description')}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control" style="width:235px">
                                        <option value="1" {{($coupon->status == 1) ? 'selected' : ''}}>Có hiệu lực</option>
                                        <option value="0" {{($coupon->status == 0) ? 'selected' : ''}}>Không có hiệu lực</option>
                                    </select>
                                </div>

                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
    </form>
@endsection

