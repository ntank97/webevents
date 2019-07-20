@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Simple Tables
        <small>preview of simple tables</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Tables</a></li>
        <li class="active">Simple</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box">
            <div class="box-header with-border">
              <h3 class="box-title">Thể loại</h3>
              <a  href="{{route('addCategory')}}" style="background-color: #32e3f3;
              border: 1px solid;
              border-color: #32e3f3;
              float: right;
              border-radius: 3px;">Thêm</a>
            </div>
            <!-- /.box-header -->
            @if ( Session::has('success') )
                <div class="alert alert-success alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
                @if ( Session::has('error') )
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <strong>{{ Session::get('success') }}</strong>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>
                </div>
                @endif
                {{--  thông báo lôi validate  --}}
                @if ($errors->any())
                <div class="alert alert-danger alert-dismissible" role="alert">
                    <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    <span class="sr-only">Close</span>
                    </button>
                </div>
                    @endif
            <div class="box-body">
              <table class="table table-bordered">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Tên</th>
                  <th>Thuộc kiểu</th>
                  <th>Action</th>
             
                </tr>
                @php
                    $i =1;    
                @endphp
                @foreach ($categories as $category)
                <tr>
                  <input class="getIdCate" type="hidden" name="" value="{{$category->id}}">
                  <td>{{$i++.'.'}}</td>
                  <td>{{$category->name_cate}}</td>
                  @if($category->type_cate==1)
                  <td>Tổ chức sự kiện</td>
                  @elseif($category->type_cate==2)
                  <td>Nhân sự sự kiện</td>
                  @elseif($category->type_cate==3)
                  <td>Thiết bị sự kiện</td>
                  @endif
                  <td>
                      <a href="javascript:void(0)" class="deleteCate" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
          
          </div>

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thể loại con thiết bị nhân sự</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-condensed">
                <tr>
                  <th>#</th>
                  <th>Tên</th>
                  <th>Thuộc kiểu</th>
                  <th>Action</th>
                </tr>
                @php
                    $i =1;    
                @endphp
                @foreach ($sub_categories_device as $sub_device)
                <tr>
                  <input class="getIdCateDevice" type="hidden" value="{{$sub_device->id}}">
                  <td>{{$i++.'.'}}</td>
                  <td>{{$sub_device->name_sub_cate}}</td>
                  <td>
                      {{$sub_device->name_cate}}
                  <td>
                    <a href="javascript:void(0)" class="deleteCateDevice" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thể loại con tổ chức sự kiện</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table">
                <tr>
                  <th>#</th>
                  <th>Tên</th>
                  <th>Thuộc kiểu</th>
                  <th>Action</th>
                </tr>
                @php
                    $i =1;    
                @endphp
                @foreach ($sub_categories_event as $sub_event)
                <input class="getIdCateEvent" type="hidden" name="" value="{{$sub_event->id}}">
                <tr>
                  <td>{{$i++.'.'}}</td>
                  <td>{{$sub_event->name_sub_cate}}</td>
                  <td>
                      {{$sub_event->name_cate}}
                  <td>
                    <a href="javascript:void(0)" class="deleteCateEvent" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                @endforeach
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->

          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Thể loại con nhân sự sự kiện</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <table class="table table-striped">
                <tr>
                  <th style="width: 10px">#</th>
                  <th>Task</th>
                  <th>Progress</th>
                  <th style="width: 40px">Label</th>
                </tr>
                @php
                    $i =1;    
                @endphp
                @foreach ($sub_categories_staff as $sub_staff)
                <input class="getIdCateStaff" type="hidden" value="{{$sub_staff->id}}">
                <tr>
                  <td>{{$i++}}.</td>
                  <td>{{$sub_staff->name_sub_cate}}</td>
                  <td>
                      {{$sub_staff->name_cate}}
                  <td>
                    <a href="javascript:void(0)" class="deleteCateStaff" href=""><span style="cursor:pointer;" title="xóa" class="badge bg-red"><i class="fa fa-trash"></i></span></a>
                  </td>
                </tr>
                @endforeach
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
//xóa sự kiện
<script>
var deleteCate = document.getElementsByClassName('deleteCate');
var getIdCate = document.getElementsByClassName('getIdCate');
var deleteCateEvent = document.getElementsByClassName('deleteCateEvent');
var getIdCateEvent = document.getElementsByClassName('getIdCateEvent');
var deleteCateDevice = document.getElementsByClassName('deleteCateDevice');
var getIdCateDevice = document.getElementsByClassName('getIdCateDevice');
var deleteCateStaff = document.getElementsByClassName('deleteCateStaff');
var getIdCateStaff = document.getElementsByClassName('getIdCateStaff');
for(let i =0; i<deleteCate.length; i++){
    deleteCate[i].addEventListener('click',function(){
    var _token =  $('meta[name="csrf-token"]').attr('content');
    let id = getIdCate[i].value;
    let objdel = $(this).parent().parent();
    if(confirm('bạn có muốn xóa thể loại này không???')){
        $.ajax({
            url: "delete-category-data",
            type: 'POST',
            data:{"id": id,"_token": _token},
            success: function(data){
                alert('Bạn xóa thành công');
                objdel.remove();
            },
            error: function(data) {
                alert(data.responseJSON.success); 
            } 
        });
    }
})
};
//sub_cate_event
for(let i =0; i<deleteCateEvent.length; i++){
  deleteCateEvent[i].addEventListener('click',function(){
  var _token =  $('meta[name="csrf-token"]').attr('content');
  let id = getIdCateEvent[i].value;
  let objdel = $(this).parent().parent();
  if(confirm('bạn có muốn xóa thể loại này không???')){
      $.ajax({
          url: "delete-category-sub-data",
          type: 'POST',
          data:{"id": id,"_token": _token},
          success: function(data){
              alert('Bạn xóa thành công');
              objdel.remove();
          },
          error: function(data) {
              alert(data.responseJSON.success); 
          } 
      });
  }
})
};
for(let i =0; i<deleteCateDevice.length; i++){
  deleteCateDevice[i].addEventListener('click',function(){
    alert('id');
  var _token =  $('meta[name="csrf-token"]').attr('content');
  let id = getIdCateDevice[i].value;
  let objdel = $(this).parent().parent();
  if(confirm('bạn có muốn xóa thể loại này không???')){
      $.ajax({
          url: "delete-category-sub-data",
          type: 'POST',
          data:{"id": id,"_token": _token},
          success: function(data){
              alert('Bạn xóa thành công');
              objdel.remove();
          },
          error: function(data) {
              alert(data.responseJSON.success); 
          } 
      });
  }
})
};
for(let i =0; i<deleteCateStaff.length; i++){
  deleteCateStaff[i].addEventListener('click',function(){
  var _token =  $('meta[name="csrf-token"]').attr('content');
  let id = getIdCateStaff[i].value;
  let objdel = $(this).parent().parent();
  if(confirm('bạn có muốn xóa thể loại này không???')){
      $.ajax({
          url: "delete-category-sub-data",
          type: 'POST',
          data:{"id": id,"_token": _token},
          success: function(data){
              alert('Bạn xóa thành công');
              objdel.remove();
          },
          error: function(data) {
              alert(data.responseJSON.success); 
          } 
      });
  }
})
};
</script>
@endsection