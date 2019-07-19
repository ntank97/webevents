@extends('master-layout')
@section('content')
<div class="main"> <!--  start main-->
    <div class="row">
        <div class=" row "> <!--  start main content -->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 main-left"> <!--  start left content-->
        <span class="in-left">DANH MỤC DỊCH VỤ</span>
        <div class="menu-top-left">
            <ul>
                @foreach ($newEvent as $new)
                    <li><i class="fas fa-star"></i><a href="{!!route('interface-page-detail',['slug'=>$new->slug])!!}">{{$new->title}}</a></li>
                @endforeach
            </ul>
        </div> <!-- hết menu-top-left -->
        <div class="dropdown">
                <i class="fas fa-angle-right"></i>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Thiết bị sự kiện <span class="caret"></span></button>

            <ul class="dropdown-menu left">
              @foreach ($deviceList as $device)
                <li><a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}">{{$device->title}}</a></li>
              @endforeach
            </ul>
      </div> <!-- hết dropdown -->
      <div class="dropdown">
              <i class="fas fa-angle-right"></i>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Nhân sự sự kiện <span class="caret"></span></button>
            <ul class="dropdown-menu left">
                @foreach ($staffList as $staffs)
                    <li><a href="{!!route('interface-page-detail',['slug'=>$staffs->slug])!!}">{{$staffs->title}}</a></li>
                @endforeach
            </ul>
      </div> <!-- hết dropdown -->
      <div class="dropdown">
              <i class="fas fa-angle-right"></i>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tổ chức sự kiện <span class="caret"></span></button>
            <ul class="dropdown-menu left">
                @foreach ($eventList as $event)
                    <li><a href="{!!route('interface-page-detail',['slug'=>$event->slug])!!}">{{$event->title}}</a></li>
                @endforeach
            </ul>
      </div> <!-- hết dropdown -->
      <div class="tintuc-sukien">
          <div class="title-tintuc">TIN TỨC & SỰ KIỆN</div>
        <div class="content-tintuc">
            <ul>
                @foreach ($blogs as $blog)
                <li>
                    <a href="{!!route('interface-page-detail-new',['slug'=>$blog->slug])!!}"><img src="{!! asset('admin/img/'.$blog->photo_cover) !!}" alt="">
                    <p>{{$blog->title}}</p>
                    </a>
                </li>
                @endforeach
            </ul>
        </div> <!-- hết content-tintuc -->
        <div class="content-tintuc">
            <video style="width: 100%;height: 150px;margin-top: 33px;" width="320" height="240" controls>
                @if($videoIntro != null)
                <source src="{{asset('admin/img'.$videoIntro->thumbnail)}}" type="video/mp4">
                @endif
            </video>
        </div>
      </div> <!-- hết tintuc-sukien -->

    </div> <!-- hết main-left -->
            <div class="col-md-9 col-xs-12 rightcont"> <!--  start right content-->
                        <div class="row main-right ">
                            <div class="col-md-12 title-box-home">
                                <a href="{!!route('interface-device')!!}">Thiết bị sự kiện</a> <i class="fas fa-arrow-circle-right text-danger"></i>
                                <span class="line-bot"></span>
                            </div>
                                @foreach ($devices as $tb)
                                    <div class="col-md-4 grid-col">
                                        <a href="{!!route('interface-page-detail',['slug'=>$tb->slug])!!}">
                                            <img src="{!! asset('admin/img/'.$tb->photo_cover) !!}" alt="">
                                        </a>
                                        <a href="{!!route('interface-page-detail',['slug'=>$tb->slug])!!}" class="grid-col-content">{{$tb->title}}</a>
                                        <a href="{!!route('interface-page-detail',['slug'=>$tb->slug])!!}" class="layer-hover"></a>
                                    </div> <!-- hết grid-col -->
                                @endforeach
                        </div> <!-- hết main-right -->
            </div> <!--  finish rightcont-->

        </div>
    </div>
<div class="container">
    <div class="col-md-9 offset-md-3 title-box-home mt-3 pl-4">
            <a href="{!!route('interface-evented')!!}">Dự án đã thực hiện</a> <i class="fas fa-arrow-circle-right text-danger"></i>
            <span class="line-bot"></span>
        <div class="nhansu owl-carousel owl-theme">
            @foreach ($evented as $val)
                <div class="item">
                    <a href="{!!route('interface-page-detail',['slug'=>$val->slug])!!}">
                        <img src="{!! asset('admin/img/'.$val->photo_cover) !!}" alt="">
                        <span>{{$val->title}}</span>
                    </a>
                </div>
            @endforeach
            
        </div>
    </div>

    <div class="col-md-9 offset-md-3 title-box-home mt-3 pl-4">
        <a href="{!!route('interface-event')!!}">tổ chức sự kiện</a> <i class="fas fa-arrow-circle-right text-danger"></i>
        <span class="line-bot"></span>
        <div class="nhansu owl-carousel owl-theme">
            @foreach ($events as $val)
                <div class="item">
                    <a href="{!!route('interface-page-detail',['slug'=>$val->slug])!!}">
                        <img src="{!! asset('admin/img/'.$val->photo_cover) !!}" alt="">
                        <span>{{$val->title}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>


    <div class="col-md-9 offset-md-3 title-box-home mt-3 pl-4">
            <a href="{!!route('interface-staff')!!}">nhân sự sự kiện</a> <i class="fas fa-arrow-circle-right text-danger"></i>
            <span class="line-bot"></span>
        <div class="nhansu owl-carousel owl-theme">
            @foreach ($staff as $val)
                <div class="item">
                    <a href="{!!route('interface-page-detail',['slug'=>$val->slug])!!}">
                        <img src="{!! asset('admin/img/'.$val->photo_cover) !!}" alt="">
                        <span>{{$val->title}}</span>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</div>
<div class="container-fluid coment">

    <div class="row">
        <div class="col-md-12 title-box-home mb-2 text-center   ">
            <a href="#">ý kiến khách hàng</a> <i class="fas fa-arrow-circle-right text-danger"></i>
            <span class="line-bot"></span>
        </div>
        @foreach ($custommer as $custom)
        <div class="col-md-4 d-flex justify-content-start coment-content">
            <div class="media">
                <img style="width: 100px;
                height: 91px;
                border-radius: 5px;
                border: 2px solid #f3efef;" src="{!! asset('admin/img/'.$custom->avatar) !!}" class="mr-3" alt="{{ $custom->name}}">
                <div class="media-body">
                    @if(strlen($custom->comment) > 250)
                    <span>{!! substr($custom->comment, 0, 250)!!}...</span>
                    @else
                    <br>
                    <span>{!! $custom->comment!!}</span>
                    @endif
                    <p style="margin:0;"></p>
                    <span style="color:red">{{$custom->name}} -- </span><span style="color:red;">{{$custom->work}}</span>
                </div>
            </div>
        </div>
        @endforeach
       
    </div>
</div>
<div class="container">
    <div class="doitac owl-carousel owl-theme">
        @foreach ( $partner as $dt)
            <div class="item">
                <img src="{!! asset('admin/img/'.$dt->photo_prtner) !!}" alt="">
            </div>
        @endforeach
    </div>
</div>
</div>
</div>
</div>

</div>
<script src="Js/backtotop.js" type="text/javascript"></script>
<script src="Js/slide.js" type="text/javascript"></script>
<script type="text/javascript" src="{{asset('')}}lib/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('')}}lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('')}}js/carousel.js"></script>
@endsection
