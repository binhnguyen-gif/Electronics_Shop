@extends("admin.layouts.app")

@php
    $isUpdate = isset($id) ? true : false;
    $routeSubmit = isset($id) ? route('admin.category.update', $id) : route('admin.category.store');
@endphp

@section('page-title')
    <section class="content-header">
        <h1><i class="glyphicon glyphicon-picture"></i> Thêm danh mục mới</h1>
        <div class="breadcrumb">
            <button id="btn_category" onclick="event.preventDefault();document.getElementById('category').submit();"
                    class="btn btn-primary btn-sm">
                <span class="glyphicon glyphicon-floppy-save"></span> Lưu[Thêm]
            </button>
            <a class="btn btn-primary btn-sm" href="{{ route('admin.category.index') }}" role="button">
                <span class="glyphicon glyphicon-remove"></span> Thoát
            </a>
        </div>
    </section>
@endsection

@section('content')
    <form action="{{ $routeSubmit }}" enctype="multipart/form-data" method="POST" accept-charset="utf-8"
          id="category">
        @csrf
        @if($isUpdate)
            @method('PUT')
        @endif
        <section class="content">
            <div class="row">
                <div class="col-md-12">
                    <div class="box" id="view">
                        <div class="box-body">
                            <div class="form-group">
                                <label>Tên danh mục <span class="maudo">(*)</span></label>
                                <input type="text" class="form-control" name="name" style="width:50%"
                                       placeholder="Tên danh mục">
                                @error('name')
                                <div class="error">{{$message}}</div>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label>Danh mục cha</label>
                                <select name="parentid" class="form-control" style="width:50%">
                                    <option value="0">[--Chọn danh mục--]</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Sắp xếp</label>
                                <select name="orders" class="form-control" style="width:50%">
                                    <option value="">[--Chọn vị trí--]</option>
                                    <option value="0">Đứng đầu</option>

                                </select>
                            </div>
                            <div class="form-group">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control" style="width:50%">
                                    <option value="">[--Chọn trạng thái--]</option>
                                    <option value="1">Đang kinh doanh</option>
                                    <option value="0">Ngưng kinh doanh</option>
                                </select>
                            </div>
                        </div>
                    </div><!-- /.box -->
                </div>
        </section>
        <!-- /.content -->
    </form>
@endsection

@push('js')

@endpush




