<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset('images/'.auth()->user()->photo) }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ auth()->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">

            <li class="header">MAIN NAVIGATION</li>
            <li>
                <a href="{{ url('/dashboard') }}">
                    <i class="fa fa-dashboard"></i>
                    <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.group-category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Nhóm thể loại</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.category.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Thể loại</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.news.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Tin Tức</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.reworks.index') }}">
                    <i class="fa fa-th"></i>
                    <span>Tuyển Dụng</span>
                </a>
            </li>

            <li class="header">LABELS</li>
            <li>
                <a href="{{ route('admin.info-submit.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Liên hệ ứng viên</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}">
                    <i class="fa fa-users"></i>
                    <span>Tài khoản</span>
                </a>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.settings.index') }}">
                    <i class="fa fa-gear text-red"></i>
                    <span>Settings</span>
                    <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                    </span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.settings.index') }}"><i class="fa fa-circle-o"></i> Genarel Setting</a>
                    </li>
                    <li><a href="{{ route('admin.advertisements.index') }}"><i class="fa fa-circle-o"></i> Advertisement
                            Setting</a></li>
                </ul>
            </li>

        </ul>

    </section>

</aside>
