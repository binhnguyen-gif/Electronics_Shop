@extends("layouts.app")

@section('page-title')
    <h1><i class="glyphicon glyphicon-picture"></i> Quản lý sliders</h1>
    <div class="breadcrumb">
       {{--  <?php
        if($user['role']==1){
            echo '<a class="btn btn-primary btn-sm" href="'.base_url().'admin/sliders/insert" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>';
        }
        ?> --}}
        <a class="btn btn-primary btn-sm" href="{{ route('slider.create') }}" role="button">
            <span class="glyphicon glyphicon-plus"></span> Thêm mới
        </a>
        <a class="btn btn-primary btn-sm" href="{{ route('slider.recyclebin') }}" role="button">
            <span class="glyphicon glyphicon-trash"></span> Thùng rác()
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
                        {{-- <?php  if($this->session->flashdata('success')):?>
                            <div class="row">
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('success'); ?>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                </div>
                            </div>
                        <?php  endif;?> --}}
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
                                    {{-- <?php foreach ($list as $row):?>
                                        <tr>
                                            <td class="text-center"><?php echo $row['id'] ?></td>
                                            <td style="width:100px">
                                                <img src="public/images/banners/<?php echo $row['img'] ?>" class="img-responsive">
                                            </td>
                                            <td><a href="<?php echo base_url() ?>admin/sliders/update/<?php echo $row['id'] ?>"><?php echo $row['name'] ?></a>
                                            </td>
                                            <td> <?php echo $row['link'] ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url() ?>admin/sliders/status/<?php echo $row['id'] ?>">
                                                    <?php if($row['status']==1):?>
                                                        <span class="glyphicon glyphicon-ok-circle mauxanh18"></span>
                                                    <?php else: ?>
                                                        <span class="glyphicon glyphicon-remove-circle maudo"></span>
                                                    <?php endif; ?>
                                                </a>
                                            </td>
                                            <?php
                                                if($user['role']==1){
                                                    echo '<td class="text-center">
                                                <a class="btn btn-success btn-xs" href="<?php echo base_url() ?>admin/sliders/update/'.$row['id'].'" role = "button">
                                                    <span class="glyphicon glyphicon-edit"></span>Sửa
                                                </a>
                                            </td>';
                                                }
                                                ?>
                                            
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs" href="<?php echo base_url() ?>admin/sliders/trash/<?php echo $row['id'] ?>" onclick="return confirm('Xác nhận xóa slider này ?')" role = "button">
                                                    <span class="glyphicon glyphicon-trash"></span>Xóa
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?> --}}
                                    @foreach($sliders as $slider)
                                    <tr>
                                            <td class="text-center">{{ data_get($slider, 'id') }}</td>
                                            <td style="width:100px">
                                                <img src="{{ asset('storage') . '/upload/' . data_get($slider, 'img') }}" class="img-responsive">
                                            </td>
                                            <td><a href="{{ route('slider.show', ['id' => data_get($slider, 'id')]) }}">{{ data_get($slider, 'name') }}</a>
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
                                                <a class="btn btn-success btn-xs" href="{{ route('slider.show', ['id' => data_get($slider, 'id')]) }}" role = "button">
                                                    <span class="glyphicon glyphicon-edit"></span>Sửa
                                                </a>
                                            </td>
                                            <td class="text-center">
                                                <a class="btn btn-danger btn-xs" href="javascript:void(0)" id="sort_delete" data-url="{{ route('slider.delete', ['id' => data_get($slider, 'id')]) }}" onclick="return confirm('Xác nhận xóa slider này ?')" role = "button">
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
                                    {{-- {{ $paginator->appends($_GET)->links() }} --}}
                                    {{ $sliders->links() }}
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

@section('modal-dialog')
    @component('modal.modal-confirm', ['html_id' => 'modal-layout'])
        <span>Thành công</span>
    @endcomponent
@endsection

@push('js')
    <script type="text/javascript">
        $(document).ready(function () {
            $(document).on('click', '#sort_delete', function (){
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
                }else {}
            })
        })
    </script>
@endpush