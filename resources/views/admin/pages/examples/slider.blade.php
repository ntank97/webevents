@extends('admin.layout_master')
@section('content')
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
      @if(Request::get('type') == 1)
      <h1>Thư viện ảnh</h1>
      @elseif(Request::get('type') == 2)
      <h1>Video</h1>
      @endif
      <ol class="breadcrumb">
        <li><a href="{{ url('admincp/') }}"><i class="fa fa-dashboard"></i> Home</a></li>
        @if(Request::get('type') == 1)
        <li class="active">Ảnh slide</li>
        @elseif(Request::get('type') == 2)
        <li class="active">video</li>
        @elseif(Request::get('type') == 3)
        <li class="active">logo</li>
        @endif
      </ol>
  </section>

  <!-- Main content -->
  <section class="content">

    <!-- Default box -->
    @if(Request::get('type') == 3)
    <div class="box" style="margin-top:25px;">
    @else
    <div class="box">
    @endif
      <div class="box-header with-border">
        @if(Request::get('type') == 1)
        <h3 class="box-title">Danh sách ảnh slider</h3>
        @elseif(Request::get('type') == 2)
        <h3 class="box-title">Video giới thiệu</h3>
        @elseif(Request::get('type') == 3)
        <h3 class="box-title">Logo</h3>
        @endif
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
      @if(Request::get('type') == 1)
        <div class="alert alert-" role="alert" style="font-size:12px;font-style:initial;">
          -  Bạn nên chọn ảnh có kich cỡ với chiều rộng:1000px - 1350px và chiều cao 400px để ảnh đẹp nhất!!! <br>
          -  Ảnh slider hiển thị cùng lúc là tối đa 5(nên để tối đa 3 ảnh) ảnh!!!
        </div>
      @endif
      @if(Request::get('type') == 2)
        <div class="alert alert-" role="alert" style="font-size:12px;font-style:initial;">
          note: Bạn nên chọn video giới thiệu có thời gian không quá dài <small>(>2 phút)</small> tránh tình trạng load trang bị chậm!!!
        </div>
      @endif
      <div class="box-body">
            <form id="frm" action="add-slider" method="POST" name="frmEdit" enctype="multipart/form-data" style="padding-left: 20px;">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <input type="hidden" name="type" value="{{Request::get('type')}}">
                {{-- @foreach ($dataProduct as $product ) --}}
               
                <div class="sidebar_content" style="display:block; float:left;padding-left:0;">
                      @php
                        $i = 1;    
                      @endphp
                      @foreach ($dataSlider as $slider)
                      <div class="img_detail">
                            <div style="position:relative;" class="form-group fix_img_product" id="{{$slider->id}}">
                                {{-- @php
                                dd(Request::get('type'));
                                @endphp --}}
                            @if(Request::get('type') == 3)
                              <label>Logo :</label><br>
                              <div style="position:relative;">
                                  <img style="width: 58%;height: auto;border: 2px solid #6e88d4;padding: 2px;" id="{{$slider->id}}" src="{!! asset('admin/img/'.$slider->thumbnail) !!}" alt="">
                                  <a title="xóa" style="position: absolute;top: -26px;font-size: 40px;left: 56%;%;color: #06cdd8;" id="icon_img_slider"  class="icon_img_detail" href="javascript:void(0)"><i class="fa fa-times-circle"></i></a>
                              </div>
                              
                            @elseif(Request::get('type') == 1)
                              <label>Ảnh số {{$i}} :</label><br>
                              <div style="position:relative;">
                                <img style="width: 58%;height: auto;border: 2px solid #6e88d4;padding: 2px;" id="{{$slider->id}}" src="{!! asset('admin/img/'.$slider->thumbnail) !!}" alt="">
                                <a title="xóa" style="position: absolute;top: -26px;font-size: 40px;left: 56%;color: #06cdd8;" id="icon_img_slider"  class="icon_img_detail" href="javascript:void(0)"><i class="fa fa-times-circle"></i></a>
                              </div>
                            @elseif(Request::get('type') == 2)
                                <label>Video của bạn :</label><br>
                                <div style="position:relative;">
                                  <video style="width: 58%;" height="auto" id="{{$slider->id}}" controls>
                                      <source src="{{asset('')}}admin/img/{{$slider->thumbnail}}" type="video/mp4">
                                  </video>
                                  <a title="xóa" style="position: absolute;top: -26px;font-size: 40px;left: 56%;color: #06cdd8;" id="icon_img_slider"  class="icon_img_detail" href="javascript:void(0)"><i class="fa fa-times-circle"></i></a>
                                </div>
                            @endif
                            </div>
                            <div>
                              {{--  <input type="file" name="img_detail[]" style="margin-bottom:20px;">  --}}
                            </div>
                        </div> 
                        @php
                          $i++;    
                        @endphp
                        @endforeach
                      <button type="button" class="btn btn-default btn-info" id="addImagesSlider" style="margin-bottom:20px;">Thêm</button>
                      <div id="insertSlider"></div>
                    </div>
               
                <div style="clear: both;"></div>
                <button type="submit" style="width: 100px;margin-bottom: 25px;" class="btn btn-primary">Lưu</button>
              </form
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
<script src="{{asset('')}}/admin/js/slider.js"></script>
</script>
@endsection

