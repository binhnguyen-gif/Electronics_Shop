@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh mục loại sản phẩm</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.category.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.category.recyclebin') }}" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thùng rác
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
                    <div class="box-body">

                        {{--                        <div class="row">--}}
                        {{--                            <div class="alert alert-success">--}}

                        {{--                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        {{--                        <div class="row">--}}
                        {{--                            <div class="alert alert-error">--}}
                        {{--                                <?php--}}
                        {{--                                ?>--}}
                        {{--                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                        {{--                            </div>--}}
                        {{--                        </div>--}}

                        <div class="row" style='padding:0px; margin:0px;'>
                            <!--ND-->
                            <div class="table-responsive">
                                <table class="table table-hover table-bordered">
                                    <thead>
                                    <tr>
                                        <th class="text-center">ID</th>
                                        <th>Tên loại sản phẩm</th>
                                        <th>Danh mục cha</th>
                                        <th class="text-center">Ngày tạo</th>
                                        <th class="text-center">Trạng thái</th>
                                        <th class="text-center" colspan="2">Thao tác</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($listCategory as $value)
                                        <tr>
                                            <td class="text-center">{{data_get($value, 'id')}}</td>
                                            <td>
                                                <a href="admin/category/update/">
                                                    {{data_get($value, 'name')}} ({{$value->count_parent_id}})
                                                </a>
                                            </td>
                                            <td>
                                                {{data_get($value, 'parent.name')}}
                                            </td>
                                            <td class="text-center">
                                                {{data_get($value, 'created_at')}}
                                            </td>
                                            <td class="text-center">
                                                <a href="admin/category/status/">
                                                    @if(data_get($value, 'status') == 1)
                                                        <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                    @endif
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-success btn-xs" href="{{route('admin.category.show', ['id' => data_get($value, 'id')])}}" role = "button">
                                                    <span class="glyphicon glyphicon-edit"></span>Sửa
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs" href="{{route('admin.category.create')}}"
                                                   onclick="return confirm('Xác nhận xóa loại sản phẩm này ?')"
                                                   role="button">
                                                    <span class="glyphicon glyphicon-trash"></span>Xóa
                                                </a>
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

