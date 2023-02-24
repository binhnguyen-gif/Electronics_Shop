@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách mã giảm giá</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.product.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.sliders.recyclebin') }}" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thùng rác({{ $total_trash ?? '' }})
        </a>
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
                        <div class="alert alert-success">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                </div>
                            </div>
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
                                        <tr>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td>đ</td>
                                            <td>

                                            </td>
                                            <td></td>
                                            <td class="text-center">
                                                <a href="admin/coupon/status/">

                                                    <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>

                                                    <span class="glyphicon glyphicon-remove-circle maudo"></span>

                                                </a>
                                            </td>
                                            <td class="text-center">
                                                {{--                                                    <?php--}}
                                                {{--                                                    if($user['role']==1){--}}
                                                {{--                                                        echo '<a class="btn btn-success btn-xs" href="'.base_url().'admin/coupon/update/'.$row['id'].'" role = "button">--}}
                                                {{--													<span class="glyphicon glyphicon-edit"></span>Sửa--}}
                                                {{--												</a>';--}}
                                                {{--                                                    }else{--}}
                                                {{--                                                        echo '<p class="fa fa-lock" style="color:red"> Không thể sửa</p>';--}}
                                                {{--                                                    }--}}
                                                {{--                                                    ?>--}}
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs" href="admin/coupon/trash"
                                                   onclick="return confirm('Xác nhận Xóa Mã giảm giá này ?')"
                                                   role="button">
                                                    <span class="glyphicon glyphicon-trash"></span>Xóa
                                                </a>
                                            </td>
                                        </tr>

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

