@extends("layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách sản phẩm</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('products.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
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
                    <div class="box-header with-border">
                        <!-- /.box-header -->
                        <div class="box-body">
                            <?php
//                            if ($this->session->flashdata('success')): ?><!---->
                            <div class="row">
                                <div class="alert alert-success">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                </div>
                            </div>
                            {{--                            <?php--}}
                            {{--                            endif; ?>--}}
                            {{--                            if ($this->session->flashdata('error')): ?>--}}
                            {{--                            <div class="row">--}}
                            {{--                                <div class="alert alert-error">--}}
                            {{--                                        <?php--}}
                            {{--                                        echo $this->session->flashdata('error'); ?>--}}
                            {{--                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×--}}
                            {{--                                    </button>--}}
                            {{--                                </div>--}}
                            {{--                            </div>--}}
                            {{--                            <?php--}}
                            {{--                            endif; ?>--}}
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width:20px">ID</th>
                                            <th>Hình</th>
                                            <th>Tên sản phẩm</th>
                                            <th>Số lượng trong kho</th>
                                            <th>Loại sản phẩm</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center">Nhập hàng</th>
                                            <th class="text-center" colspan="2">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td class="text-center"></td>
                                            <td style="width:70px">
                                                <img src="public/images/products/"
                                                     alt="" class="img-responsive">
                                            </td>
                                            <td style="font-size: 16px;"></td>
                                            <td class="text-center"></td>

                                            <td></td>
                                            <td class="text-center">
                                                <a href="admin/product/status/">
                                                    {{--                                                        <?php--}}
                                                    {{--                                                    if ($row['status'] == 1): ?>--}}
                                                    <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                    {{--                                                    <?php--}}
                                                    {{--                                                    else: ?>--}}
                                                    <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                    {{--                                                    <?php--}}
                                                    {{--                                                    endif; ?>--}}
                                                </a>
                                            </td>
                                            {{--                                               --}}

                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs"
                                                   href="admin/product/trash/"
                                                   onclick="return confirm('Xác nhận xóa sản phẩm này ?')"
                                                   role="button">
                                                    <span class="glyphicon glyphicon-trash"></span> Xóa
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

