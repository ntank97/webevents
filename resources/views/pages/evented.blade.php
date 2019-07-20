@extends('master-layout')
@section('content')
<div class="main"> <!--  start main-->
    <div class="row">
        <div class="row">
            <div class="col-md-12">
                <div class="title">
                    <h1>Tổ Chức Sự Kiện</h1> <!--  title page-->
                    <div class="is-divider">
                    </div>
                </div>
            </div>
        </div>
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
            <ul class="dropdown-menu">
               @foreach ($deviceList as $device)
                <li><a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}">{{$device->title}}</a></li>
              @endforeach
            </ul>
      </div> <!-- hết dropdown -->
      <div class="dropdown">
              <i class="fas fa-angle-right"></i>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Nhân sự sự kiện <span class="caret"></span></button>
            <ul class="dropdown-menu">
             @foreach ($staffList as $staffs)
                    <li><a href="{!!route('interface-page-detail',['slug'=>$staffs->slug])!!}">{{$staffs->title}}</a></li>
                @endforeach
            </ul>
      </div> <!-- hết dropdown -->
      <div class="dropdown">
              <i class="fas fa-angle-right"></i>
            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tổ chức sự kiện <span class="caret"></span></button>
            <ul class="dropdown-menu">
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
      </div> <!-- hết tintuc-sukien -->

    </div> <!-- hết main-left -->
            <div class="col-md-9 col-xs-12 rightcont"> <!--  start right content-->
                        <div class="row main-right ">
                            <div class="col-md-12 title-box-home">
                                <a href="#">Tổ chức sự kiện</a> <i class="fas fa-arrow-circle-right text-danger"></i>
                                <span class="line-bot"></span>
                            </div>
                            @foreach ($eventstc as $val)
                            <div class="col-md-3 grid-col">
                                <a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}">
                                        <img src="{!! asset('admin/img/'.$val->photo_cover) !!}" alt="{{$val->title}}" title="{{$val->title}}">
                                </a>
                                <a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}" class="grid-col-content">{{$val->title}}</a>
                                <a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}" class="layer-hover"></a>
                            </div> <!-- hết grid-col -->
                            @endforeach
                        </div> <!-- hết main-right -->
                        <div style="text-align:center;margin-top:30px;">
                            <div class="paginated" style="display:inline-block;">
                                    {!! $eventstc->links() !!}
                            </div>
                         </div>
                </div>
            </div> <!--  finish rightcont-->
            
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
