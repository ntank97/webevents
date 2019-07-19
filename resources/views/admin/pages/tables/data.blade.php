<style>
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
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      @if (Request::get('type') == 1)
      <h1>Tổ chức sự kiện</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{!!route('events',['type'=>1])!!}">Tổ chức sự kiện</a></li>
        <li class="active">Danh tổ chức sự kiện</li>
      </ol>
      @elseif(Request::get('type') == 2)
      <h1>Nhân sự sự kiện</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{!!route('events',['type'=>2])!!}">Nhân sự sự kiện</a></li>
        <li class="active">Danh sách nhân sự sự kiện</li>
      </ol>
      @elseif(Request::get('type') == 3)
      <h1>Thiết bị sự sự kiện</h1>
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="{!!route('events',['type'=>3])!!}">Thiết bị sự kiện</a></li>
        <li class="active">Danh sách thiết bị sự kiện</li>
      </ol>
      @endif
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Danh sách</h3>
            </div>
            @php
            $post_user = \Auth::user()->name;
            $type = Request::get('type');
            @endphp
            @if ( Session::has('success') )
              <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
              </div>
            @endif
            <div style="display:none;" id="alert_delete_list_pr" class="alert alert-success alert-dismissible">
                <span id="alert_delete_list"></span>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                  <span class="sr-only">Close</span>
                </button>
            </div>
            <div>
              <h3 style="float:right;margin-right:10px;"><a href="{!!route('managerAdd',['type'=> $type,'post-user' => $post_user])!!}" style="text-decoration: none;font-size: 13px;padding: 8px 14px;background-color: #2870ca;color: white;border-radius: 5px;font-weight: 600;">Thêm</a></h3>
            </div>
            <div style="clear: both;"></div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>STT</th>
                  <th>Tiêu đề</th>
                  <th>Người đăng</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Trang thái</th>
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @php
                $i =1;    
                @endphp
                @foreach ($events as $event)
                <tr>
                  <input class="getIdEvent" type="hidden" name="id_user" value="{{$event->id}}">
                  <td>{{$i++}}</td>
                  <td>{{$event->title}}</td>
                  <td>{{$event->name}}</td>
                  <td>{{$event->start_day}}</td>
                  <td>{{$event->end_day}}</td>
                  <td>
                      @if($event->status == 0)
                      <button style="cursor:text;" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...</button>
                      @elseif ($event->status == 2)
                      <button title="Thời gian tổ chức sự kiện đã kết thúc" style="background-color:#cec8bf;border-color:#cec8bf;cursor:text;" class="btn btn-sm btn-warning"><i class="fa fa-ban"></i> Deactive</button>
                      @elseif ($event->status == 1)
                      <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning"><i class="fa fa-check-circle"></i> Hoạt động</button>
                      @endif
                  </td>
                  <td>
                    <a href="{!!route('managerEdit',['id'=>$event->id,'type'=> $type,'post-user' => $post_user])!!}"><span style="cursor:pointer;" title="sửa" class="btn_edit_frm badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                    <a href="javascript:void(0)" class="deleteEvent" href=""><span style="cursor:pointer;" title="xóa" class="delete_btn_frm badge bg-red"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                  <th>STT</th>
                  <th>Tiêu đề</th>
                  <th>Người đăng</th>
                  <th>Ngày bắt đầu</th>
                  <th>Ngày kết thúc</th>
                  <th>Trang thái</th>
                  <th>Chức năng</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
<script src="{{asset('')}}/admin/js/litsEvent.js"></script>
{{-- <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script> --}}
@endsection


