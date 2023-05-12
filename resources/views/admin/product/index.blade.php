@extends("admin.layouts.app")

@push('css')
    <link rel="stylesheet" href="{{ asset("assets/css/product.css") }}">
@endpush

@section('page-title')
    <h1><i class="glyphicon glyphicon-cd"></i>Danh sách sản phẩm</h1>
    <div class="breadcrumb">
        <a class="btn btn-primary btn-sm" href="{{ route('admin.product.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('admin.product.recyclebin') }}" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thùng rác({{ $total_trash ?? '' }})
        </a>
    </div>
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <form method="get" accept-charset="utf-8">
            <div class="row">
                <div class="col-md-12 form-search">
                    <div class="product-search col-md-3">
                        <input type="text" name="q" class="form-control" placeholder="Tìm kiếm...">
                    </div>   
                    <button class="product-submit">Tìm kiếm</button>
                </div>
            </div>
        </form>

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
                                        @foreach($listProduct as $product)
                                            <tr>
                                                <td class="text-center">{{data_get($product, 'id')}}</td>
                                                <td style="width:70px">
                                                    <img src="{{asset('storage/upload') . '/' . data_get($product, 'avatar')}}"
                                                         alt="" class="img-responsive">
                                                </td>
                                                <td style="font-size: 16px;">{{data_get($product, 'name')}}</td>
                                                <td class="text-center">{{data_get($product, 'number')}}</td>
                                                <td>{{data_get($product, 'category_id')}}</td>
                                                <td class="text-center">
                                                    <a href="admin/product/status/">
                                                        @if(data_get($product, 'status') == 1)
                                                            <span
                                                                class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                        @else
                                                            <span
                                                                class="glyphicon glyphicon-remove-circle maudo"></span>
                                                        @endif
                                                    </a>
                                                </td>
                                                <td class="text-center"><a class="btn btn-info btn-xs" href="admin/product/import/'.$row['id'].'" role = "button">
                                                        <span class="glyphicon glyphicon-trash"></span>Nhập hàng
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-success btn-xs" href="" role = "button">
                                                        <span class="glyphicon glyphicon-edit"></span> Sửa
                                                    </a>
                                                </td>
                                                <td class="text-center">
                                                    <a class="btn btn-danger btn-xs"
                                                       href="admin/product/trash/"
                                                       onclick="return confirm('Xác nhận xóa sản phẩm này ?')"
                                                       role="button">
                                                        <span class="glyphicon glyphicon-trash"></span> Xóa
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

