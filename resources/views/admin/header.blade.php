<header class="main-header">
    <!-- Logo -->
    <a href="{{ url('admincp/') }}" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>a</b>dmin</span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Admin</b></span>
        {{--  <img src="{!! asset('admin/img/'.$logo->thumbnail) !!}" alt="">  --}}
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{!! asset('admin/img/'.Auth::user()->avatar) !!}" class="user-image" alt="User Image">
                <span class="hidden-xs"> {!!Auth::user()->name!!}</span>
            </a>
            <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                <img src="{!! asset('admin/img/'.Auth::user()->avatar) !!}" class="img-circle" alt="User Image">

                <p>
                    {!!Auth::user()->name!!}
                    <small>Member since Nov. 2012</small>
                </p>
                </li>
                <!-- Menu Body -->
                </li>
                <li class="user-footer">
                <div class="pull-left">
                    <a href="{!!route('profile')!!}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                    <a href="{{ url('admincp/logouts') }}" class="btn btn-default btn-flat">Sign out</a>
                </div>
                </li>
            </ul>
            </li>
            <!-- Control Sidebar Toggle Button -->
            <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
            </li>
        </ul>
        </div>
    </nav>
</header>