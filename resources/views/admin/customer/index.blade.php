@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách Liên hệ khách hàng</h1>
    <div class="breadcrumb">
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
                        <div class="box-body">

                            <div class="row">
                                <div class="alert alert-success">
                                    <?php
                                    ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                </div>
                            </div>

                            <div class="row">
                                <div class="alert alert-error">

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
                                            <th>Tên khách hàng</th>
                                            <th>Email</th>
                                            <th>Điện thoại</th>
                                            <th class="text-center" colspan="2">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="text-center"></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td class="text-center">
                                                <a class="btn btn-info btn-xs" href="admin/customer/update/"
                                                   role="button">
                                                    <span class="glyphicon glyphicon-edit"></span>Xem
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs" href="admin/customer/trash/"
                                                   onclick="return confirm('Xác nhận xóa thông tin khách hàng này ?')"
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

