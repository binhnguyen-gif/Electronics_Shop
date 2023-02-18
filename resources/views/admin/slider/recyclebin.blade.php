@extends("layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-picture"></i> Thùng rác sliders</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('sliders.index') }}" role="button">
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
                        <div class="box-body">
                            @if(session()->has('success'))
                                <div class="row" style="display: none;">
                                    <div class="alert alert-success">
                                        {{ session()->get('success') }}
                                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                        </button>
                                    </div>
                                </div>
                            @endif
                            <div class="row" id="modal" style="display: none;">
                                <div class="alert alert-success">
                                    Sucess
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×
                                    </button>
                                </div>
                            </div>
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
                                            <th class="text-center">Khôi phục</th>
                                            <th class="text-center">Xóa VV</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($recyclebin as $value)
                                            <tr>
                                                <td class="text-center">{{ data_get($value, 'id', '') }}</td>
                                                <td style="width:100px">
                                                    <img
                                                        src="{{ asset('storage') . '/upload/' . data_get($value, 'img') }}"
                                                        alt="{{ data_get($value, 'name') }}" class="img-responsive">
                                                </td>
                                                <td>{{ data_get($value, 'name') }}</td>
                                                <td>{{ data_get($value, 'slug') }}</td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-xs" id="restore"
                                                       href="javascript:void(0)"
                                                       data-url="{{ route('sliders.restore', ['id' => data_get($value, 'id')]) }}"
                                                       role="button">
                                                        <span class="glyphicon glyphicon-edit"></span>Khôi phục
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-xs" href="javascript:void(0)"
                                                       data-url="{{ route('sliders.forever_delete', ['id' => data_get($value, 'id')]) }}"
                                                       role="button" id="forever_delete">
                                                        <span class="glyphicon glyphicon-trash"></span>Xóa VV
                                                    </a>
                                                </td>
                                                {{-- <td class="text-center">
                                                    <p class="fa fa-lock" style="color:red"> Không đủ quyền</p>
                                                </td>'; --}}
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <div class="row">
                                    <div class="col-md-12 text-center">
                                        <ul class="pagination">
                                            {{-- <?php echo $strphantrang ?> --}}
                                        </ul>
                                    </div>
                                </div>
                                <!-- /.ND -->
                            </div>
                        </div><!-- ./box-body -->
                    </div><!-- /.box -->
                </div>
    </section>

@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '#forever_delete', function () {
                var url = $(this).data('url');
                if (url) {
                    $.ajax({
                        method: 'DELETE',
                        url: url,
                        // enctype: 'multipart/form-data',
                        // data: {id : },
                        // contentType: false,
                        // processData: false,
                        success: function () {
                            window.location.reload(true);
                        },
                        error: function () {
                        }
                    });
                } else {
                }
            })


            $(document).on('click', '#restore', function () {
                var url = $(this).data('url');
                if (url) {
                    $.ajax({
                        method: 'PUT',
                        url: url,
                        // dataType: 'json,
                        // data: {},
                        // enctype: 'multipart/form-data',
                        // data: formData,
                        // contentType: false,
                        // processData: false,
                        success: function () {
                            window.location.reload(true);
                            // $('#modal').css('display', 'block');
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
