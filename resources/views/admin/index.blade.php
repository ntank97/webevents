<style>
  .modal-body label{
    font-weight: 500;
    margin-bottom: -9px;
  }
  .modal-body input{
    margin-bottom: 15px;
  }
  .modal-header {
    border-bottom-color: #cde5ea!important
  }
  .glyphicon-refresh-animate {
    -animation: spin .7s infinite linear;
    -webkit-animation: spin2 .7s infinite linear;
  }
  
  @-webkit-keyframes spin2 {
      from { -webkit-transform: rotate(0deg);}
      to { -webkit-transform: rotate(360deg);}
  }
  
  @keyframes spin {
      from { transform: scale(1) rotate(0deg);}
      to { transform: scale(1) rotate(360deg);}
  }
</style>
@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Dashboard
        <small>Version 2.0</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-aqua"><i style="font-size:50px;" class="ion ion-ios-people-outline"></i></span>

            <div class="info-box-content">
              <span class="info-box-text">Tổ chức sự kiện</span>
              <span style="font-size:13px;" class="info-box-number">{{$countEvent}}<small style="font-size:11px;" > Hoạt động<small></span>
              <span style="font-size:13px;"  class="info-box-number">{{$countEventPending}}<small style="font-size:11px;" > chờ phê duyệt<small></span>
              {{--  <span style="font-size:13px;"  class="info-box-number">{{$countEventDeactive}}<small style="font-size:11px;" > đã kết thúc<small></span>  --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-red"><i class="fa fa-user"></i></span>

            <div class="info-box-content">
              <span style="font-size:13px;" class="info-box-text">Nhân sự sự kiện</span>
              <span style="font-size:13px;" class="info-box-number">{{$countStaff}}<small style="font-size:11px;"> Hoạt động</small></span>
              <span style="font-size:13px;" class="info-box-number">{{$countStaffPending}}<small style="font-size:11px;"> Chờ phê duyệt</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->

        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>

        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-green"><i style="font-size:50px;" class="ion ion-ios-gear-outline"></i></span>

            <div class="info-box-content">
                <span style="font-size:13px;" class="info-box-text">Thiết bị sự kiện</span>
                <span style="font-size:13px;" class="info-box-number">{{$countDevice}}<small style="font-size:11px;"> Hoạt động</small></span>
                <span style="font-size:13px;" class="info-box-number">{{$countDevicePending}}<small style="font-size:11px;"> Chờ phê duyệt</small></span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
             
            <span class="info-box-icon bg-yellow"><i class="fa fa-comments"></i></span>

            <div class="info-box-content">
                <span style="font-size:13px;" class="info-box-text">Tin tức - Đánh giá</span>
                <span style="font-size:13px;" class="info-box-number">{{$totalBlog}}<small style="font-size:11px;"> Tổng số tin tức</small></span>
                <span style="font-size:13px;" class="info-box-number">{{$totalComment}}<small style="font-size:11px;"> Lượt đánh giá</small></span>

                {{--  <span style="font-size:13px;" class="info-box-number">{{$total}}<small style="font-size:11px;"> Tổng số hoạt động</small></span>  --}}
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <div class="col-md-12">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Giới thiệu</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-wrench"></i></button>
                  <ul class="dropdown-menu" role="menu">
                    <li><a href="#">Action</a></li>
                    <li><a href="#">Another action</a></li>
                    <li><a href="#">Something else here</a></li>
                    <li class="divider"></li>
                    <li><a href="#">Separated link</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                <div class="row">
                  <div class="col-md-12">
                      <video style="width:100%;" height="auto" controls autoplay>
                          @if($video!=null)
                          <source src="{{asset('')}}admin/img/{{$video->thumbnail}}" type="video/mp4">
                          @endif
                      </video>
                  </div>
                </div>
            </div>
            <!-- ./box-body -->
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Main row -->
      <div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          
          <!-- TABLE: LATEST ORDERS -->
          <div class="box box-info">
            <div class="box-header with-border">
              <h3 class="box-title">Blogs</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                <table class="table no-margin">
                  <thead>
                  <tr>
                    <th>Tiêu đề</th>
                    <th>Ảnh</th>
                    <th>Người đăng</th>
                    <th>Trạng thái</th>
                  </tr>
                  </thead>
                  <tbody>
                  @foreach ($blogs as $blog)
                  <tr>
                    <td>{{$blog->title}}</td>
                    <td>
                      <img style="width:50px;" src="{!! asset('admin/img/'.$blog->photo_cover) !!}" alt="">
                    </td>
                    <td>{{$blog->name}}</td>
                    <td>
                        @if($blog->status == 0)
                        <button class="btn btn-sm btn-warning pull-right"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>Chờ phê duyệt...</button>
                        @elseif($blog->status == 1)
                        <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning pull-right"><i class="fa fa-check-circle"></i> Hoạt động</button>
                        @endif
                    </td>
                  </tr>
                  @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.table-responsive -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer clearfix">
              <a href="{!! route('blogs') !!}" class="btn btn-sm btn-default btn-flat pull-right">View more</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <div class="box box-info">
              <div class="box-header with-border">
                <h3 class="box-title">Đối tác</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <div class="table-responsive">
                  <table class="table no-margin">
                    <thead>
                    <tr>
                      <th>Tên</th>
                      <th>Ảnh</th>
                      <th>Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($partner as $val)
                    <tr>
                      <td>{{$val->name}}</td>
                      <td>
                        <img style="width:50px;" src="{!! asset('admin/img/'.$val->photo_prtner) !!}" alt="">
                      </td>
                      <?php \Carbon\Carbon::setLocale('vi')?>
                      <td><span class="label label-success">{!! \Carbon\Carbon::createFromTimeStamp(strtotime($val->created_at))->diffforHumans() !!}</span></td>
                    </tr>
                    @endforeach
                    </tbody>
                  </table>
                </div>
                <!-- /.table-responsive -->
              </div>
              <!-- /.box-body -->
              <div class="box-footer clearfix">
                <a href="{!! route('partner') !!}" class="btn btn-sm btn-default btn-flat pull-right">View more</a>
              </div>
              <!-- /.box-footer -->
            </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->

        
        

        <div class="col-md-4">
          <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Tổ chức các sự kiện</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                @foreach ($events as $event)
                <li class="item">
                  <div class="product-img">
                    <img style="height:auto;" src="{!! asset('admin/img/'.$event->photo_cover) !!}" alt="event image">
                  </div>
                  <div class="product-info">
                    <a style="font-size:15px;" href="javascript:void(0)" class="product-title">{{$event->title}}
                      @if($event->status == 0)
                      <button class="btn btn-sm btn-warning pull-right"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>Chờ phê duyệt...</button>
                      @elseif($event->status == 1)
                      <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning pull-right"><i class="fa fa-check-circle"></i> Hoạt động</button>
                      @endif
                    {{-- <span class="product-description">
                          Samsung 32" 1080p 60Hz LED Smart HDTV.
                        </span> --}}
                  </div>
                </li>
                @endforeach
                <!-- /.item -->
              </ul>
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
              <a style="font-size:15px;" href="{!!route('events',['type'=>1])!!}" class="uppercase">View more</a>
            </div>
            <!-- /.box-footer -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Tổ chức các sự kiện</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  @foreach ($staff as $event)
                  <li class="item">
                    <div class="product-img">
                      <img style="height:auto;" src="{!! asset('admin/img/'.$event->photo_cover) !!}" alt="event image">
                    </div>
                    <div class="product-info">
                      <a style="font-size:15px;" href="javascript:void(0)" class="product-title">{{$event->title}}
                        @if($event->status == 0)
                        <button class="btn btn-sm btn-warning pull-right"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>Chờ phê duyệt...</button>
                        @elseif($event->status == 1)
                        <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning pull-right"><i class="fa fa-check-circle"></i> Hoạt động</button>
                        @endif
                      {{-- <span class="product-description">
                            Samsung 32" 1080p 60Hz LED Smart HDTV.
                          </span> --}}
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a style="font-size:15px;" href="{!!route('events',['type'=>2])!!}" class="uppercase">View more</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
        <div class="col-md-4">
            <!-- PRODUCT LIST -->
            <div class="box box-primary">
              <div class="box-header with-border">
                <h3 class="box-title">Nhân sự sự kiện</h3>
  
                <div class="box-tools pull-right">
                  <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                  </button>
                  <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                </div>
              </div>
              <!-- /.box-header -->
              <div class="box-body">
                <ul class="products-list product-list-in-box">
                  @foreach ($device as $event)
                  <li class="item">
                    <div class="product-img">
                      <img style="height:auto;" src="{!! asset('admin/img/'.$event->photo_cover) !!}" alt="event image">
                    </div>
                    <div class="product-info">
                      <a style="font-size:15px;" href="javascript:void(0)" class="product-title">{{$event->title}}
                        @if($event->status == 0)
                        <button class="btn btn-sm btn-warning pull-right"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span>Chờ phê duyệt...</button>
                        @elseif($event->status == 1)
                        <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning pull-right"><i class="fa fa-check-circle"></i> Hoạt động</button>
                        @endif
                      {{-- <span class="product-description">
                            Samsung 32" 1080p 60Hz LED Smart HDTV.
                          </span> --}}
                    </div>
                  </li>
                  @endforeach
                  <!-- /.item -->
                </ul>
              </div>
              <!-- /.box-body -->
              <div class="box-footer text-center">
                <a style="font-size:15px;" href="{!!route('events',['type'=>3])!!}" class="uppercase">View more</a>
              </div>
              <!-- /.box-footer -->
            </div>
            <!-- /.box -->
          </div>
        </div>
        
       <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection

  
  
