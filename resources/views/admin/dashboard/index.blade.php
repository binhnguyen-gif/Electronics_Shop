@extends("admin.layouts.app")

@section('content')
    <!-- Main content -->
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-aqua">
                    <div class="inner">
                        <h3></h3>
                        <p>Sản phẩm</p>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                    </div>
                    <a href="" class="small-box-footer">Danh sách sản phẩm</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-green">
                    <div class="inner">
                        <h3></h3>
                        <p>Bài viết</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-android-chat "></i>
                    </div>
                    <a href="" class="small-box-footer">Danh sách bài viết</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-yellow">
                    <div class="inner">
                        <h3></h3>
                        <p>Liên hệ</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-email"></i>
                    </div>
                    <a href="" class="small-box-footer">Liên hệ khách hàng</a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-xs-6">
                <!-- small box -->
                <div class="small-box bg-red">
                    <div class="inner">
                        <h3></h3>
                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-cube"></i>
                    </div>
                    <a href="" class="small-box-footer">Danh sách đơn hàng</a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- /.row -->
    </section>
    <section class="content">
        <div class="row">
            <!-- /.col (LEFT) -->
            <div class="col-md-12">
                <!-- LINE CHART -->
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">Bán hàng & Doanh thu</h3>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i
                                    class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i
                                    class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="chart">
                            <div id="chart_div" style="width: 100%; height: 250px;"></div>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-sm-4 col-xs-6">
                                <div class="description-block border-right">
                                    <h5 class="description-header" style="color: #e90000;"> VNĐ</h5>
                                    <span class="description-text">Tổng doanh thu</span>
                                </div>
                                <!-- /.description-block -->
                            </div>
                            <!-- /.col -->
                        </div>

                        <!-- /.row -->
                    </div>
                    <!-- /.box-body -->
                </div>
            </div>
    </section>
    <!-- /.content -->
    <script>
        google.charts.load('current', {'packages': ['corechart']});
        google.charts.setOnLoadCallback(drawVisualization);

        function drawVisualization() {
            var data = google.visualization.arrayToDataTable([
                ['Month', 'Bán ra', 'Đơn hàng'],

            ]);

            var options = {
                title: 'Số lượng bán ra từ 01/2019 - 12/2019',
                seriesType: 'bars'
            };

            var chart = new google.visualization.ComboChart(document.getElementById('chart_div'));
            chart.draw(data, options);
        }
    </script>
@endsection
