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
        <h3 class="box-title">Sửa</h3>

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
        <form action="manager-edit-data" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="_token" value="{{csrf_token()}}">
        <input type="hidden" name="id" value="{{$event->id}}">
        <input type="hidden" name="type" value="{{$event->type}}">
        <input type="hidden" name="status" value="{{$event->status}}">
        <div class="row">
            <div class="col-md-12">
              <div class="box box-danger" style="border:none;>
                <div class="box-header">
                  {{--  <h3 class="box-title">Input masks</h3>  --}}
                </div>
                <div class="box-body">
                  <div class="form-group">
                    <label for="exampleInputEmail1">Tiêu đề</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" placeholder="tiêu đề bài viết" name="title" value="{!! old('name',isset($event) ? $event->title : null) !!}">
                  </div>
                  <div class="form-group">
                    <label>Nội dung</label>
                    <textarea class="form-control" rows="3" placeholder="Enter ..." id="editor1" name="content">{!! old('content',isset($event) ? $event->content : null) !!}</textarea>
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
                    <label>Ngày bắt đầu sự kiện(<small>Không bắt buộc</small>)</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="start_time" type="date" class="form-control" data-inputmask="'alias': 'dd/mm/yyyy'" data-mask value="{!! old('start_time',isset($event) ? $event->start_day : null) !!}">
                    </div>
                  </div>
    
                  <div class="form-group">
                    <label>Ngày kết thúc sự kiện(<small>Không bắt buộc</small>)</label>
                    <div class="input-group">
                      <div class="input-group-addon">
                        <i class="fa fa-calendar"></i>
                      </div>
                      <input name="end_time" type="date" class="form-control" data-inputmask="'alias': 'mm/dd/yyyy'" data-mask value="{!! old('end_time',isset($event) ? $event->end_day : null) !!}">
                    </div>
                  </div>
                  <div class="form-group fix_img_product">
                    <label for="">Ảnh nền của sự kiện</label><br>
                    <img style="width:150px;border: 2px solid #116fbf;padding: 3px;;" src="{!! asset('admin/img/'.$event->photo_cover) !!}" alt="ảnh sự kiên hiện tại">
                  </div>
                  <div class="form-group">
                    <label for="exampleInputFile">Ảnh nền</label>
                    <input type="file" id="exampleInputFile" name="img_cover">
  
                    <p class="help-block">Chọn ảnh nền cho sự kiên ở đây.</p>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Đăng bởi</label>
                    <input name="author" type="text" class="form-control" id="exampleInputEmail1" placeholder="post user" disabled value="{!! $event->name !!}">
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
<script>
    $(document).ready(function () {
      $('.sidebar-menu').tree();
    $(function () {
      //Initialize Select2 Elements
      $('.select2').select2()
  
      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
      //Money Euro
      $('[data-mask]').inputmask()
  
      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
      //Date range as a button
      $('#daterange-btn').daterangepicker(
        {
          ranges   : {
            'Today'       : [moment(), moment()],
            'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month'  : [moment().startOf('month'), moment().endOf('month')],
            'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate  : moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )
  
      //Date picker
      $('#datepicker').datepicker({
        autoclose: true
      })
  
      //iCheck for checkbox and radio inputs
      $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
        checkboxClass: 'icheckbox_minimal-blue',
        radioClass   : 'iradio_minimal-blue'
      })
      //Red color scheme for iCheck
      $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
        checkboxClass: 'icheckbox_minimal-red',
        radioClass   : 'iradio_minimal-red'
      })
      //Flat red color scheme for iCheck
      $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
        checkboxClass: 'icheckbox_flat-green',
        radioClass   : 'iradio_flat-green'
      })
  
      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()
  
      //Timepicker
      $('.timepicker').timepicker({
        showInputs: false
      })
    })
  })
  </script>
@endsection

