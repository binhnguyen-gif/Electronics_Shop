@extends("layouts.app")

@php
    $isUpdate = isset($id) ? true : false;
    $routeSubmit = isset($id) ? route('sliders.update', $id) : route('sliders.store');
@endphp

@section('page-title')
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-picture"></i> Thêm Sliders</h1>
        <div class="breadcrumb">
            <button name="THEM_NEW" id="btn_slider" class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
            </button>
            <a class="btn btn-primary btn-sm" href="{{ route('sliders.index') }}" role="button">
                <span class="glyphicon glyphicon-remove"></span> Thoát
            </a>
        </div>
    </section>
@endsection

@section('content')
    <form action="{{ $routeSubmit }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8"
          id="upload_slider">
        @csrf
        @if($isUpdate)
            @method('PUT')
        @endif
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="col-md-9">
                                <div class="form-group">
                                    <label>Tên sản phẩm <span class="maudo">(*)</span></label>
                                    <input type="text" class="form-control" name="name" style="width:100%"
                                           placeholder="Tên sản phẩm">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-6" style="padding-left: 0px;">
                                            <div class="form-group">
                                                <label>Loại sản phẩm<span class="maudo">(*)</span></label>
                                                <select name="catid" class="form-control">
                                                    <option value="">[--Chọn loại sản phẩm--]</option>
                                                </select>
                                                <div class="error" id="password_error"></div>
                                            </div>
                                        </div>
                                        <div class="col-md-6" style="padding-right: 0px;">
                                            <div class="form-group">
                                                <label>Nhà cung cấp <span class="maudo">(*)</span></label>
                                                <select name="producer" class="form-control">
                                                    <option value="">[--Chọn nhà cung cấp--]</option>

                                                </select>
                                                <div class="error" id="password_error"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Mô tả ngắn</label>
                                    <textarea name="sortDesc" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Chi tiết sản phẩm</label>
                                    <textarea name="detail" id="detail" class="form-control"></textarea>
                                    <script>CKEDITOR.replace('detail');</script>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Giá gốc</label>
                                    <input name="price_root" class="form-control" type="number" value="0" min="0"
                                           step="1" max="1000000000">
                                </div>
                                <div class="form-group">
                                    <label>Khuyến mãi (%)</label>
                                    <input name="sale_of" class="form-control" type="number">
                                </div>
                                <div class="form-group">
                                    <label>Giá bán</label>
                                    <input name="price_buy" class="form-control" type="number" value="0" min="0"
                                           step="1" max="1000000000">
                                    <div class="error" id="password_error"></div>
                                </div>
                                <div class="form-group">
                                    <label>Số lượng</label>
                                    <input name="number" class="form-control" type="number" value="1" min="1" step="1"
                                           max="1000">
                                </div>
                                <div class="form-group">
                                    <label>Hình đại diện</label>
                                    <input type="file" id="image_list" name="img" required style="width: 100%">
                                </div>
                                <div class="form-group">
                                    <label>Hình ảnh sản phẩm</label>
                                    <input type="file" id="image_list" name="image_list[]" multiple required>
                                </div>
                                <div class="form-group">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1">Kinh doanh</option>
                                        <option value="0">Chưa Kinh doanh</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
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




