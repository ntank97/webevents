@extends('admin.layout_master')
@section('content')
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

    <!-- Default box -->
    <div class="box">
      <div class="box-header with-border">
        <h3 class="box-title">Thêm</h3>

        <div class="box-tools pull-right">
          <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                  title="Collapse">
            <i class="fa fa-minus"></i></button>
          <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
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
      </div>
      <div class="box-body">
        <form action="add-category-data" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="user_id" value="{!! \Auth::user()->id !!}">
        <input type="hidden" name="type" value="{{Request::get('type')}}">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-danger" style="border:none;>
                <div class="box-header">
                  {{--  <h3 class="box-title">Input masks</h3>  --}}
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tên thể loại</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tên thể loại" name="name">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn kiểu cho thể loại:</label>
                    <select style="height: 26px;
                    border-radius: 5px;
                    background: #043663;
                    color: white;
                    border: 1px solid #043663;
                    outline: none;" name="category">
                        <option value="0">--Chọn--</option>
                        <option value="1">Tổ chức sự kiện</option>
                        <option value="2">Nhân sự sự kiện</option>
                        <option value="3">Thiết bị sự kiện</option>
                    </select>
                  </div>
                  <div class="form-group">
                        <label for="exampleInputEmail1">Bạn có muốn thêm thể loại con cho thể loại này không?</label>
                        <span id="add_category" style="padding: 5px 10px;
                        background: #d01dc1;
                        border-radius: 5px;
                        color: white;
                        cursor: pointer;">add</span>
                        <div id="insertCategory" style="margin-top:10px;"></div>
                  </div>
    
                </div>
                <!-- /.box-body -->
              </div>
              <button style="width:80px;float:right;margin-right: 23px;" type="submit" class="btn btn-block btn-success btn-lg">Thêm</button>
              <!-- /.box -->
            </div>
            <!-- /.col (left) -->
          </div>
        </form>
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
<script src="{{asset('')}}/admin/js/category.js"></script>
@endsection

