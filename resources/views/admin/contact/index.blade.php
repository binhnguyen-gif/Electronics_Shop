@extends("layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách Liên hệ khách hàng</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('sliders.recyclebin') }}" role="button">
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
                    <!-- /.box-header -->
                    <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    </div>
                    <div class="box-body">
                        <?php ?>
                        <div class="row">
                            <div class="alert alert-success">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            </div>
                        </div>
                        <div class="row" style='padding:0px; margin:0px;'>
                            <!--ND-->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center" style="width:20px">ID</th>
                                        <th class="text-center">Tên</th>
                                        <th class="text-center">Ngày gửi</th>
                                        <th class="text-center">Địa chỉ mail</th>
                                        <th class="text-center">Tiêu đề</th>
                                        <th class="text-center" style="width:90px">Trạng thái</th>

                                        <th class="text-center" colspan="2">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>
                                        <td class="text-center"></td>

                                        <td class="text-center">
                                            <a href="admin/contact/status/">

                                                <span class="fa fa-eye-slash maudo"  data-toggle="tooltip" data-placement="top" title="Chưa xem"></span>

                                                <span class="fa fa-eye mauxanh18"  data-toggle="tooltip" data-placement="top" title="Đã xem"></span>

                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-info btn-xs" href="admin/contact/detail/" role = "button">
                                                <span class="glyphicon glyphicon-trash"></span>Xem
                                            </a>
                                        </td>
                                        <td class="text-center">
                                            <a class="btn btn-danger btn-xs" href="admin/contact/trash/" onclick="return confirm('Xác nhận xóa liên hệ này ?')" role = "button">
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

