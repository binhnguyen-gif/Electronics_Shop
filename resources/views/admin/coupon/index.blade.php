@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách mã giảm giá</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.coupon.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
{{--        <a class="btn btn-primary btn-sm" href="{{ route('admin.coupon.recyclebin') }}" role="button">--}}
{{--            <span class="glyphicon glyphicon-trash"></span> Thùng rác({{ $total_trash ?? '' }})--}}
{{--        </a>--}}
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box" id="view">
                    <div class="box-header with-border">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th class="text-center">Mã giảm giá</th>
                                            <th class="text-center">Số tiền giảm</th>
                                            <th class="text-center"
                                            ">Số tiền đơn hàng áp dụng tối thiểu</th>
                                            <th class="text-center"
                                            ">Số lần giới hạn nhập</th>
                                            <th class="text-center"
                                            ">Hạn nhập</th>
                                            <th class="text-center"
                                            ">Trạng thái</th>
                                            <th class="text-center" colspan="2">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($coupons as $coupon)
                                                <tr>
                                                    <td class="text-center">{{data_get($coupon, 'id')}}</td>
                                                    <td>{{data_get($coupon, 'code')}}</td>
                                                    <td>{{data_get($coupon, 'discount')}}</td>
                                                    <td>{{data_get($coupon, 'payment_limit')}}đ</td>
                                                    <td>
                                                        {{data_get($coupon, 'limit_number')}}
                                                    </td>
                                                    <td>{{data_get($coupon, 'expiration_date')}}</td>
                                                    <td class="text-center">
                                                        <a href="admin/coupon/status/">
                                                            @if(data_get($coupon, 'status') == 1)
                                                                <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                            @else
                                                                <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                            @endif
                                                        </a>
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-success btn-xs" href="{{route('admin.coupon.show', ['id' => $coupon->id])}}" role = "button">
                                                            <span class="glyphicon glyphicon-edit"></span>Sửa
                                                        </a>
{{--                                                        <p class="fa fa-lock" style="color:red"> Không thể sửa</p>--}}
                                                    </td>
                                                    <td class="text-center">
                                                        <a class="btn btn-danger btn-xs" href="javascript:void(0);"
                                                           onclick="event.preventDefault();
                                                            if (confirm('Xác nhận xóa nha cung c này ?')) {
                                                                document.getElementById('delete-coupon').submit();
                                                            }"
                                                           role="button">
                                                            <span class="glyphicon glyphicon-trash"></span>Xóa
                                                        </a>
                                                        <form action="{{route('admin.coupon.delete', ['id' => data_get($coupon, 'id')])}}" method="POST" id="delete-coupon">
                                                            @csrf
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.ND -->
                            </div>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
    </section>
@endsection

