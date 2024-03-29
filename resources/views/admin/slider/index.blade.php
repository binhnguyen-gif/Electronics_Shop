@extends("admin.layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-picture"></i> Quản lý sliders</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.sliders.create') }}" role="button">
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
                        <div class="box-body">

                            <div class="row">
                                <!--ND-->
                                <div class="table-responsive">
                                    <table class="table table-hover table-bordered">
                                        <thead>
                                        <tr>
                                            <th class="text-center">ID</th>
                                            <th>Hình</th>
                                            <th>Tên sliders</th>
                                            <th>Liên kết</th>
                                            <th class="text-center">Trạng thái</th>
                                            <th class="text-center" colspan="2">Thao tác</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        @foreach($data as $slider)
                                            <tr>
                                                <td class="text-center">{{ data_get($slider, 'id') }}</td>
                                                <td style="width:100px">
                                                    <img
                                                        src="{{ asset('storage') . '/upload/' . data_get($slider, 'img') }}"
                                                        class="img-responsive">
                                                </td>
                                                <td>
                                                    <a href="{{ route('admin.sliders.show', ['id' => data_get($slider, 'id')]) }}">{{ data_get($slider, 'name') }}</a>
                                                </td>
                                                <td>{{ data_get($slider, 'slug') }}</td>
                                                <td class="text-center">
                                                    @if(data_get($slider, 'status') == 1)
                                                        <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                    @else
                                                        <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                    @endif
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-xs"
                                                       href="{{ route('admin.sliders.show', ['id' => data_get($slider, 'id')]) }}"
                                                       role="button">
                                                        <span class="glyphicon glyphicon-edit"></span>Sửa
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-xs" href="javascript:void(0)"
                                                       id="sort_delete"
                                                       data-url="{{ route('admin.sliders.delete', ['id' => data_get($slider, 'id')]) }}"
                                                       onclick="return confirm('Xác nhận xóa slider này ?')"
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
                                        {{-- @php
                                           var_dump($_GET);die();
                                       @endphp --}}
                                        {{-- {{ $paginator->appends($_GET)->links() }} --}}
                                        {{ $paginator->appends($_GET)->onEachSide(5)->links() }}
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

{{-- @section('modal-dialog')
    @component('modal.modal-confirm', ['html_id' => 'modal-layout'])
        <span>Thành công</span>
    @endcomponent
@endsection --}}

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '#sort_delete', function () {
                var url = $(this).data('url');
                if (url) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        // enctype: 'multipart/form-data',
                        // data: formData,
                        // contentType: false,
                        // processData: false,
                        success: function () {
                            // location.reload();
                            window.location.reload(true);
                        },
                        error: function () {
                        }
                    });
                } else {
                }
            })
        })
    </script>
@endpush
