<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ asset('adminLte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item  menu-open">
                    <a href="{{ route('dashboard') }}">
                        <i class="fa fa-home"></i> Dashboard </a>
                </li>


                    @roleorpermission(['admin', 'employee-list'])
                    <li class="nav-item @if(in_array(request()->segment(2), ['employee', 'designation', 'department'] ) ) menu-open @endif">
                        <a href="">
                            <i class="fa fa-user-secret"></i> Employees <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav @if(in_array(request()->segment(2), ['employee', 'designation', 'department'])) collapse in @endif">
                            @can('customer-create')
                                <li class="@if(request()->segment(2) == 'employee' && request()->segment(3) == 'create' ) active @endif">
                                    <a href="{{ route('employee.create') }}"><i class="fa fa-plus"></i> Add
                                        new employee</a>
                                </li>
                            @endcan
                            <li class="@if(request()->segment(2) == 'employee' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('employee.index') }}"><i class="fa fa-user"></i>
                                    Employees</a>
                            </li>
                            @can('department-list')
                                <li class="@if(request()->segment(2) == 'department' && request()->segment(3) == '' ) active @endif">
                                    <a href="{{ route('department.index') }}"><i
                                            class="fa fa-code-branch"></i> Departments</a>
                                </li>
                            @endcan
                            @can('designation-list')
                                <li class="@if(request()->segment(2) == 'designation' && request()->segment(3) == '' ) active @endif">
                                    <a href="{{ route('designation.index') }}"><i class="fa fa-tag"></i>
                                        Designations</a>
                                </li>
                            @endcan
                        </ul>
                    </li>
                    @endroleorpermission
                    @hasanyrole('admin')
                    <li class="nav-item @if(in_array(request()->segment(2), ['user', 'role', 'permission', 'option'] ) ) menu-open @endif">
                        <a href="">
                            <i class="fa fa-cogs"></i> Manage <i class="fa arrow"></i>
                        </a>
                        <ul class="sidebar-nav  @if(in_array(request()->segment(2), ['user', 'role', 'permission'] ) ) collapse in @endif">
                            <li class="@if(request()->segment(2) == 'currency' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('currency.index')}}"><i class="fa fa-usd"></i>
                                    Currencies </a>
                            </li>
                            <li class="@if(request()->segment(2) == 'user' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('user.index')}}"><i class="fa fa-user-secret"></i>
                                    Administrators </a>
                            </li>
                            <li class="@if(request()->segment(2) == 'role' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('role.index') }}"><i class="fa fa-tag"></i> Roles </a>
                            </li>
                            <li class="@if(request()->segment(2) == 'permission' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('permission.index') }}"><i class="fa fa-wrench"></i>
                                    Permissions </a>
                            </li>
                            <li class="@if(request()->segment(2) == 'option' && request()->segment(3) == '' ) active @endif">
                                <a href="{{ route('option.index') }}"><i class="fa fa-cog"></i> Settings </a>
                            </li>
                        </ul>
                    </li>
                    @endrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
