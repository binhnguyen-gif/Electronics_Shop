@extends("layouts.app")

@php
    $isUpdate = isset($id) ? true : false;
    $routeSubmit = isset($id) ? route('slider.update', $id) : route('slider.store');
@endphp

@section('page-title')
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-picture"></i> Thêm Sliders</h1>
        <div class="breadcrumb">
            <button name="THEM_NEW" id="btn_slider" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
            </button>
            <a class="btn btn-primary btn-sm" href="{{ route('slider.index') }}" role="button">
                <span class="glyphicon glyphicon-remove"></span> Thoát
            </a>
        </div>
    </section>
@endsection

@section('content')
    <form action="{{ $routeSubmit }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8" id="upload_slider">
        @csrf
        @if($isUpdate)
            @method('PUT')
        @endif
        <section class="content">
          <!-- Info boxes -->
          <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-body">
                        <div class="col-md-9">
                            <!--ND-->
                            <div class="form-group">
                                <label>Tên sliders<span class = "maudo">(*)</span></label>
                                <input type="text" name="name" placeholder="Tên sliders" class="form-control" value="{{ isset($slider) ? data_get($slider, 'name') : '' }}">
                                <!-- <div class="error" id="password_error"></div> -->
                            </div>
                            <!--/.ND-->
                        </div>
                        <div class="col-md-3">
                                
                            <div class="form-group">
                                <label>Hình ảnh <span class = "maudo">(*)</span></label>
                                <input type="file" name="img" class="form-control" required="" value="{{ isset($slider) ? data_get($slider, 'img') : '' }}">
                                <!-- <div class="error" id="password_error"></div> -->
                            </div>
                            <div class="form-group">
                                <label>Trạng thái </label>
                                <select name="status" class="form-control">
                                    <option value="1" @if(isset($slider) && data_get($slider, 'status') == 1) selected @endif>Hoạt động</option>
                                    <option value="0" @if(isset($slider) && data_get($slider, 'status') == 0) selected @endif>Ngừng hoạt động</option>
                                    {{-- @if(isset($slider) && data_get($slider, 'status') == 1)
                                        <option value="1">Hoạt động</option>
                                    @else
                                        <option value="0">Ngừng hoạt động</option>
                                    @endif --}}
                                </select>
                            </div>
                            </div>
                    </div>
                </div><!-- /.box -->
            </div><!-- /.row -->
        </section><!-- /.content -->
    </form>         
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '#btn_slider', function () {
                $('#upload_slider').submit();
            });
        });
    </script>
@endpush
