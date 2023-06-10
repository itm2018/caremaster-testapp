<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('adminDashboard')}}" class="brand-link">
        <img src="{{asset('admin-lte/dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Admin Panel</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{asset('admin-lte/dist/img/user2-160x160.jpg')}}" class="img-circle elevation-2"
                     alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{\Illuminate\Support\Facades\Auth::guard('admin')->user()->name}}</a>
            </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <a href="#" class="nav-link active">
                        <i class="nav-icon fas fa-table"></i>
                        <p>
                            Management
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    {{$routeName = \Illuminate\Support\Facades\Route::current()->getName()}}
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('company.index')}}" class="nav-link {{str_contains($routeName, 'company')?'active':''}}">
                                <i class="nav-icon fas fa-paperclip"></i>
                                <p>
                                    Companies
                                </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('employee.index')}}" class="nav-link {{str_contains($routeName, 'employee')?'active':''}}">
                                <i class="nav-icon fas fa-table"></i>
                                <p>
                                    Employees
                                </p>
                            </a>
                        </li>
                    </ul>
                <li class="nav-item">
                    <a href="{{route('adminLogout')}}" class="nav-link">
                        <i class="nav-icon fas fa-sign-out-alt"></i>
                        <p>
                            Logout
                        </p>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
