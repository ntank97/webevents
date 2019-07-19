@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    Blank page
    <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li><a href="#">Examples</a></li>
    <li class="active">Blank page</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Blog</h3>
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
        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
            <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
        <form action="blogs-edit-data" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{$blog->id}}">
            <input type="hidden" name="slug" value="{{$blog->slug}}">
            <input type="hidden" name="user_id" value="{{$blog->user_id}}">
            <input type="hidden" name="status" value="{{$blog->status}}">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-danger" style="border:none;>
                    <div class="box-header">
                        {{--  <h3 class="box-title">Input masks</h3>  --}}
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tiêu đề bài viết" name="title" value="{!! old('name',isset($blog) ? $blog->title : null) !!}">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Tiêu đề</label>
                        <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tóm tắt nội dung" name="short_cut" value="{!! old('short_cut',isset($blog) ? $blog->title : null) !!}">
                        </div>
                        <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="editor1" name="content">{!! old('content',isset($blog) ? $blog->content : null) !!}</textarea>
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
                        <div class="form-group fix_img_product">
                            <label for="">Ảnh nền hiện tại</label><br>
                            <img style="width:150px;border: 2px solid #116fbf;padding: 3px;;" src="{!! asset('admin/img/'.$blog->photo_cover) !!}" alt="ảnh tin tức hiện tại">
                        </div>
                        <div class="form-group">
                        <label for="exampleInputFile">Ảnh nền</label>
                        <input type="file" id="exampleInputFile" name="img_cover">
                        <p class="help-block">Chọn ảnh nền cho sự kiên ở đây.</p>
                        </div>
                        <div class="form-group">
                        <label for="exampleInputEmail1">Đăng bởi</label>
                        <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="post user" disabled value="{!! $blog->name !!}">
                        </div>
        
                    </div>
                    <!-- /.box-body -->
                    </div>
                    <button style="width:80px;float:right;margin-right: 23px;" type="submit" class="btn btn-block btn-success btn-lg">Lưu lại</button>
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
@endsection
