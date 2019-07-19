@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
    <h1>
    Liên hệ
    <small>it all starts here</small>
    </h1>
    <ol class="breadcrumb">
    <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Liên hệ</li>
    </ol>
    </section>

    <!-- Main content -->
    <section class="content">

    <!-- Default box -->
    <div class="box">
    <div class="box-header with-border">
        <h3 class="box-title">Nội dung</h3>

        <div class="box-tools pull-right">
        <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                title="Collapse">
            <i class="fa fa-minus"></i></button>
        <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fa fa-times"></i></button>
        </div>
    </div>
    <div class="box-body">
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
        <form action="contact-edit" method="POST" enctype="multipart/form-data">
            @if($contact!=null)
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <input type="hidden" name="id" value="{{ $contact->id }}">
            <div class="row">
                <div class="col-md-12">
                    <div class="box box-danger" style="border:none;>
                    <div class="box-header">
                        {{--  <h3 class="box-title">Input masks</h3>  --}}
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên công ty</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="địa chỉ cửa hàng" name="name" value="{!! old('name',isset($contact) ? $contact->name_company : null) !!}">
                        </div>
                        <div class="form-group">
                        <label>Nội dung</label>
                        <textarea class="form-control" rows="3" placeholder="Enter ..." id="editor1" name="content">{!! old('content',isset($contact) ? $contact->content : null) !!}</textarea>
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
                            <label for="exampleInputEmail1">Địa chỉ</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="Địa chỉ" name="address" value="{{$contact->name_company}}">
                        </div>
                        
                        <div class="form-group">
                            <label for="exampleInputEmail1">Địa chỉ kho hàng</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="địa chỉ cửa hàng" name="store" value="{!! old('store',isset($contact) ? $contact->store : null) !!}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Số điện thoại</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" placeholder="số điện thoại" name="phone" value="{!! old('phone',isset($contact) ? $contact->phone : null) !!}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="email" name="email" value="{!! old('email',isset($contact) ? $contact->email : null) !!}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Website</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="website công ty" name="site" value="{!! old('site',isset($contact) ? $contact->site : null) !!}">
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
            @endif

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
