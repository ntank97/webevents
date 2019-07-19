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
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
        Blog
        <small>it all starts here</small>
        </h1>
        <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Blog</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Title</h3>

            <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
                <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
                <i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            
        <div class="box" style="border:none;">
            <div class="box-header">
                <h3 class="box-title">Danh sách tin tức</h3>
                <h3 style="float:right;margin-right:10px;"><a href="{!!route('addBlog')!!}" style="text-decoration: none;font-size: 13px;padding: 8px 14px;background-color: #2870ca;color: white;border-radius: 5px;font-weight: 600;">Thêm</a></h3>
            </div>
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                <strong>{{ Session::get('success') }}</strong>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                </button>
                </div>
            @endif
            <div id="alert_delete_blog" class="alert alert-success alert-dismissible" style="display:none;">
                    <span id="alert_delete_blog"></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        <span class="sr-only">Close</span>
                    </button>
                </div>
            <!-- /.box-header -->
            <div class="box-body">
                <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh nền</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @php
                    $i =1;    
                @endphp
                @foreach ($blogs as $blog)
                <tr>
                    <input class="idBlog" type="hidden" name="id" value="{{$blog->id}}">
                    <td>{{$i}}</td>
                    <td>{{$blog->title}}</td>
                    <td><img style="width: 100px;height: 100px;border-radius: 5px;object-fit: cover;" src="{!! asset('admin/img/'.$blog->photo_cover) !!}" alt=""></td>
                    <td>{{$blog->name}}</td>
                    <td>{{$blog->created_at}}</td>
                    <td>
                     @if($blog->status == 0)
                      <button style="cursor:text;" class="btn btn-sm btn-warning"><span class="glyphicon glyphicon-refresh glyphicon-refresh-animate"></span> Chờ phê duyệt...</button>
                      @elseif ($blog->status == 1)
                      <button style="background-color:#13c76c;border-color:#13c76c;cursor:text;" class="btn btn-sm btn-warning"><i class="fa fa-check-circle"></i> Hoạt động</button>
                      @endif
                    </td>
                    <td>
                        <a href="{!!route('editBlog',['slug'=>$blog->slug])!!}"><span style="cursor:pointer;" title="sửa" class="btn_edit_frm_event badge bg-light-blue"><i class="fa fa-edit"></i></span></a>
                        <a href="javascript:void(0)" class="deleteBlog" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                    </td>
                </tr>
                @endforeach
                </tbody>
                <tfoot>
                <tr>
                    <th>STT</th>
                    <th>Tiêu đề</th>
                    <th>Ảnh nền</th>
                    <th>Người đăng</th>
                    <th>Ngày đăng</th>
                    <th>Trạng thái</th>
                    <th>Chức năng</th>
                </tr>
                </tfoot>
                </table>
            </div>
            <!-- /.box-body -->
            </div>

        </div>
        <!-- /.box-body -->
        <div class="box-footer">
            Footer
        </div>
        <!-- /.box-footer-->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
<script>
    //delete
    var deleteBlog = document.getElementsByClassName('deleteBlog');
    var idBlog = document.getElementsByClassName('idBlog');
    for(let i =0; i<deleteBlog.length; i++){
        deleteBlog[i].addEventListener('click',function(){
          let id = idBlog[i].value;
          let _token =  $('meta[name="csrf-token"]').attr('content');
          if(confirm('bạn có thực sự muốn xóa không?')){
            let objdel = $(this).parent().parent();
            $.ajax({
              url: "blogs-delete-data",
              type: 'POST',
              data:{"id": id,"_token": _token},
              success: function(data){
                document.getElementById('alert_delete_blog').style.display = 'block';
                document.getElementById('alert_delete_blog').innerText = data.success;
                objdel.remove();
              },
              error: function(data) {
                alert(data.responseJSON.success); 
              } 
          });
          }
        });
      }
</script>
@endsection