@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-picture"></i> Thùng rác producer</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.producer.index') }}" role="button">
            <span class="glyphicon glyphicon-remove do_nos"></span> Thoát
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
                            @if(session()->has('success'))
                                <div class="row">
                                    <div class="alert alert-success">
                                        {{session()->get('success')}}
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Tên nhà cung cấp</th>
                                            <th>Ngày đăng</th>
                                            <th>Người đăng</th>
                                            <th class="text-center">Khôi phục</th>
                                            <th class="text-center">Xóa VV</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recyclebin as $value)
                                            <tr>
                                                <td class="text-center">{{data_get($value, 'id')}}</td>
                                                <td>
                                                    <a href="">{{data_get($value, 'name')}}</a>
                                                </td>
                                                <td>{{data_get($value, 'created_at')}}</td>
                                                <td>{{data_get($value, 'poster')}}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-xs" onclick="event.preventDefault();document.getElementById('restore-form').submit();"
                                                       role="button">
                                                        <span class="glyphicon glyphicon-edit"></span>Khôi phục
                                                    </a>
                                                    <form
                                                        action="{{route('admin.producer.restore', ['id' => data_get($value, 'id')])}}"
                                                        method="POST" style="display: none;" id="restore-form">
                                                        @csrf
                                                        @method('PUT')
                                                    </form>
                                                </td>

                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-xs"
                                                       onclick="event.preventDefault();
                                                    if (confirm('Xác nhận xóa vv loại sản phẩm này ?')) {
                                                        document.getElementById('delete-form').submit();
                                                    }" role="button">
                                                        <span class="glyphicon glyphicon-trash"></span>Xóa VV
                                                    </a>
                                                    <form
                                                        action="{{route('admin.producer.forever_delete', ['id' => data_get($value, 'id')])}}"
                                                        method="POST" style="display: none;" id="delete-form">
                                                        @csrf
                                                        @method('DELETE')
                                                    </form>
                                                </td>


                                                {{--                                            <td class="text-center">--}}
                                                {{--                                                <p class="fa fa-lock" style="color:red"> Không đủ quyền</p>--}}
                                                {{--                                            </td>--}}

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


