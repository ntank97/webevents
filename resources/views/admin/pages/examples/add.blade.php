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
        <form action="manager-add-data" method="POST" enctype="multipart/form-data">
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
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tiêu đề bài viết" name="title">
                  </div>
                  <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="editor1" name="content"></textarea>
                    <script>
                      CKEDITOR.replace( 'editor1', {
                        filebrowserBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html') }}',
                        filebrowserImageBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html?type=Images') }}',
                        filebrowserFlashBrowseUrl: '{{ asset('admin/ckfinder/ckfinder.html?type=Flash') }}',
                        filebrowserUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files') }}',
                        filebrowserImageUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images') }}',
                        filebrowserFlashUploadUrl: '{{ asset('admin/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash') }}'
                    } );
                    </script>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn thể loại cho sựu kiện:</label>
                    <select id="getValueCate" onchange="myCategory()" style="height: 26px;
                    border-radius: 5px;
                    background: #043663;
                    color: white;
                    border: 1px solid #043663;
                    outline: none;" name="category">
                        <option value="0">--Chọn--</option>
                        @foreach($category as $cate)
                        <option value="{{$cate->id}}">{{$cate->name_cate}}</option>
                        @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Chọn thể loại cho sựu kiện:</label>
                    <select id="sub_category" style="height: 26px;
                    border-radius: 5px;
                    background: #043663;
                    color: white;
                    border: 1px solid #043663;
                    outline: none;" name="sub_category">
                        <option value="0">--Chọn--</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Ngày bắt đầu sự kiện(<small>Không bắt buộc</small>)</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="start_time" type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask>
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label>Ngày kết thúc sự kiện(<small>Không bắt buộc</small>)</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="end_time" type="date" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh nền</label>
                    <input type="file" id="exampleInputFile" name="img_cover">
                    <p class="help-block">Chọn ảnh nền cho sự kiên ở đây.</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Đăng bởi</label>
                    <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="post user" disabled value="{{Request::get('post-user')}}">
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
<script src="{{asset('admin/js/addEvent.js')}}"></script>
@endsection

