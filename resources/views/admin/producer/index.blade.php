@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách nhà cung cấp</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.producer.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.producer.recyclebin') }}" role="button">
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

                        {{--                        <div class="alert alert-success">--}}

                        {{--                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>--}}
                        {{--                        </div>--}}

                        <div class="box-body">

                            <div class="row" style='padding:0px; margin:0px;'>
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center" style="width:20px">ID</th>
                                            <th class="text-center">Code</th>
                                            <th class="text-center">Name</th>
                                            <th class="text-center">Keyword</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center" colspan="2">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($listProducer as $value)
                                            <tr>
                                                <td class="text-center">{{data_get($value, 'id')}}</td>
                                                <td>{{data_get($value, 'code')}}</td>
                                                <td>{{data_get($value, 'name')}}</td>
                                                <td>{{data_get($value, 'keyword')}}</td>
                                                <td class="text-center">
                                                    <a href="admin/producer/status/">
                                                        @if(data_get($value, 'status') == 1)
                                                            <span
                                                                class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                        @else
                                                            <span
                                                                class="glyphicon glyphicon-remove-circle maudo"></span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-xs"
                                                       href="{{route('admin.producer.show', ['id' => data_get($value, 'id')])}}" role="button">
                                                        <span class="glyphicon glyphicon-edit"></span>Sửa
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-xs"
                                                       onclick="event.preventDefault();
                                                    if (confirm('Xác nhận xóa nha cung c này ?')) {
                                                        document.getElementById('delete-form').submit();
                                                    }"
                                                       role="button">
                                                        <span class="glyphicon glyphicon-trash"></span>Xóa
                                                    </a>
                                                    <form
                                                        action="{{route('admin.producer.delete', ['id' => data_get($value, 'id')])}}"
                                                        method="POST" style="display: none;" id="delete-form">
                                                        @csrf
                                                        @method('DELETE')
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

