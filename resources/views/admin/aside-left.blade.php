<style>
    *{
        font-size: 14px;
    }
    {{-- li{
        background: #1e282c!important';
    } --}}
</style>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
<!-- sidebar: style can be found in sidebar.less -->
<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
    <div class="pull-left image">
        <img src="{!! asset('admin/img/'.Auth::user()->avatar) !!}" class="img-circle" alt="User Image" style="max-width: 50px;
        height: 50px;
        object-fit: cover;">
    </div>
    <div class="pull-left info">
        <p>{!!Auth::user()->name!!}</p>
        <a href="{!!route('profile')!!}"><i class="fa fa-circle text-success"></i> Online</a>
    </div>
    </div>
    <!-- search form -->
    <form action="#" method="get" class="sidebar-form">
    <div class="input-group">
        {{-- <input type="text" name="q" class="form-control" placeholder="" disabled> --}}
        {{-- <span class="input-group-btn">
            <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
            </button>
            </span> --}}
    </div>
    </form>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
    <li class="header">MAIN NAVIGATION</li>
    <li class="active">
        <a href="{{ url('admincp/') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
        </a>
    </li>
    
    <li class="treeview">
        <a href="#">
        <i class="fa fa-table"></i> <span>Quản lý các sự kiện</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
            <span class="pull-right-container" style="top: -100%;position: absolute;width: 86px;left: -66px;font-size: 12px;">
                @if( count($countAdminDevice)>0)
                <small class="label pull-right bg-yellow">{{count($countAdminDevice)}}</small>
                @endif
                @if( count($countAdminStaff)>0)
                <small class="label pull-right bg-green">{{count($countAdminStaff)}}</small>
                @endif
                @if( count($countAdminEvent)>0)
                <small class="label pull-right bg-red">{{count($countAdminEvent)}}</small>
                @endif
            </span>
        </span>
        </a>
        <ul class="treeview-menu">
        {{--  <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>  --}}
        <li style="position:relative;"><a href="{!!route('events',['type'=>1])!!}"><i class="fa fa-circle-o"></i>Tổ chức sự kiện</a>
            <span class="pull-right-container" style="top:8px;position: absolute;width: 86px;right: 0;font-size: 12px;">
                @if( count($countAdminEvent)>0)
                <small class="label pull-right bg-red">{{count($countAdminEvent)}}</small>
                @endif
            </span>
        </li>
        <li  style="position:relative;"><a href="{!!route('events',['type'=>2])!!}"><i class="fa fa-circle-o"></i>Nhân sự sự kiện</a>
            <span class="pull-right-container" style="top:8px;position: absolute;width: 86px;right: 0;font-size: 12px;">
                @if( count($countAdminStaff)>0)
                <small class="label pull-right bg-green">{{count($countAdminStaff)}}</small>
                @endif
            </span>
        </li>
        <li  style="position:relative;"><a href="{!!route('events',['type'=>3])!!}"><i class="fa fa-circle-o"></i>Thiết bị sự kiện</a>
            <span class="pull-right-container" style="top:8px;position: absolute;width: 86px;right: 0;font-size: 12px;">
                @if( count($countAdminDevice)>0)
                <small class="label pull-right bg-yellow">{{count($countAdminDevice)}}</small>
                @endif
            </span>
        </li>
       
        </ul>
    </li>
    <li>
        <a href="{!!route('addCategory')!!}">
        <i class="fa fa-edit"></i> <span>Thêm thể loại</span>
        </a>
    </li>
    <li>
        <a href="{!!route('blogs')!!}">
        <i class="fa fa-edit"></i> <span>Blogs</span>
        <span class="pull-right-container" style="font-size: 12px;">
            @if( count($countAdminBlog)>0)
            <small class="label pull-right bg-yellow">{{count($countAdminBlog)}}</small>
            @endif
        </span>
        </a>
    </li>
    <li>
        <a href="{!!route('partner')!!}">
            <i class="fa fa-pie-chart"></i><span>Đối tác</span>
        </a>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-folder"></i> <span>Images-video</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="{!!route('slider',['type'=>3])!!}"><i class="fa fa-circle-o"></i> Logo</a></li>
        <li><a href="{!!route('slider',['type'=>1])!!}"><i class="fa fa-circle-o"></i> Ảnh slider</a></li>
        <li><a href="{!!route('slider',['type'=>2])!!}"><i class="fa fa-circle-o"></i> Video giới thiệu</a></li>
        </ul>
    </li>
    <li class="treeview">
        <a href="#">
        <i class="fa fa-book"></i> <span>Quản lý thông tin</span>
        <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
        </span>
        </a>
        <ul class="treeview-menu">
        <li><a href="{!!route('contact')!!}"><i class="fa fa-circle-o"></i> Liên hệ</a></li>
        <li><a href="{!!route('intro')!!}"><i class="fa fa-circle-o"></i> giới thiệu</a></li>
        <li><a href="{!!route('team')!!}"><i class="fa fa-circle-o"></i> Our team</a></li>
        </ul>
    </li>
    <li>
        <a href="{!!route('custommer-index')!!}">
        <i class="fa fa-laptop"></i> <span>Quản lý nhận xét</span>
        <span class="pull-right-container" style="font-size: 12px;">
            @if( count($countAdminComment)>0)
            <small class="label pull-right bg-yellow">{{count($countAdminComment)}}</small>
            @endif
        </span>
        </a>
    </li>
    <li><a href="{!!route('profile')!!}"><i class="fa fa-address-card"></i> <span>Profile</span></a></li>
</section>
<!-- /.sidebar -->
</aside>