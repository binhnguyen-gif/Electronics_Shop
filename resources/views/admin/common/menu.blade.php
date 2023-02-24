<aside class="main-sidebar">

    <section class="sidebar">
        <ul class="sidebar-menu">
            <li class="treeview">
                <a href="">
                    <i class="fa fa-bar-chart"></i> <span>Thống kê</span>
                </a>
            </li>
            <li class="header">QUẢN LÝ CỬA HÀNG</li>
            <li class="treeview">
                <a href="">
                    <i class="glyphicon glyphicon-list"></i><span>Tin tức</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.product.index') }}">
                    <i class="fa fa-leaf"></i><span>Sản phẩm</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-indent"></i><span>Loại sản phẩm</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.producer.index') }}">
                    <i class="fa fa-gift"></i><span>Nhà cung cấp</span>
                </a>
            </li>
            <li class="header">QUẢN LÝ BÁN HÀNG</li>
            <li class="treeview">
                <a href="{{ route('admin.coupon.index') }}">
                    <i class="fa fa-diamond"></i> <span>Mã giảm giá</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.contact.index') }}">
                    <i class="fa fa-envelope"></i> <span>Liên hệ</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.orders.index') }}">
                    <i class="fa fa-shopping-cart"></i> <span>Đơn hàng</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.customer.index') }}">
                    <i class="fa fa-user"></i><span>Khách hàng</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.sliders.index') }}">
                    <i class="fa fa-cogs"></i> <span>Giao diện</span>
                </a>
            </li>
            <li class="header">CÀI ĐẶT</li>
            <li class="treeview">
                <a href="#">
                    <i class="glyphicon glyphicon-cog"></i><span>Hệ thống</span>
                    <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active">
                        <a href="">
                            <i class="fa fa-cogs"></i> Cấu hình
                        </a>
                    </li>
                </ul>
            </li>
            <li><a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('form_logout').submit();"><i class="fa fa-sign-out text-red"></i> <span>Thoát</span></a></li>
            <form action="{{ route('admin.logout') }}" method="POST" id="form_logout">
                @csrf
            </form>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
