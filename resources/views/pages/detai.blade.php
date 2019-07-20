@extends('master-layout')
@section('content')
<div class="main">
    <!--  start main-->
    <div class="row">
        <div class=" row ">
            <!--  start main content -->
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 main-left">
                <!--  start left content-->
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
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Thiết bị sự
                        kiện <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach ($deviceList as $device)
                            <li><a href="{!!route('interface-page-detail',['slug'=>$device->slug])!!}">{{$device->title}}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- hết dropdown -->
                <div class="dropdown">
                    <i class="fas fa-angle-right"></i>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Nhân sự sự kiện
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        @foreach ($staffList as $staffs)
                            <li><a href="{!!route('interface-page-detail',['slug'=>$staffs->slug])!!}">{{$staffs->title}}</a></li>
                        @endforeach
                    </ul>
                </div> <!-- hết dropdown -->
                <div class="dropdown">
                    <i class="fas fa-angle-right"></i>
                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">Tổ chức sự kiện
                        <span class="caret"></span></button>
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
            <div class="col-md-9 col-xs-12 rightcont">
                <!--  start right content-->
                <div class="detai-title">
                    <span>thiết bị sự kiện</span>
                    <span>Cho thuê sân khấu tổ chức sự kiện - sạch đẹp - miễn phí tại HÀ NỘI</span>
                    <?php \Carbon\Carbon::setLocale('vi')?>
                    <span>post by: {{$dataDetail->name}} {!! \Carbon\Carbon::createFromTimeStamp(strtotime($dataDetail->created_at))->diffforHumans() !!}</span>
                </div>
                <div class="row main-right" style="margin-bottom:35px;">
                    <img style="margin-bottom:35px;margin-top:15px;" src="{{asset('admin/img/'.$dataDetail->photo_cover)}}" alt="">
                    @if($dataDetail != null)
                    {!! $dataDetail->content !!}
                    @endif


                </div>
                {{--  <div class="icon-contact d-flex justify-content-center">
                    <a href="">
                        <div class="icon">
                            <i class="fab fa-facebook-f"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                                <i class="fab fa-twitter"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                                <i class="fas fa-envelope"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                                <i class="fas fa-ad"></i>
                        </div>
                    </a>
                    <a href="">
                        <div class="icon">
                                <i class="fas fa-laugh-squint"></i>
                        </div>
                    </a>
                </div>  --}}
                <div style="border-bottom:1px solid #e2dddf;margin-bottom:20px;margin-top"35px;></div>
                <div>
                    <div id="fb-root"></div>
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.3&appId=2275703206010986&autoLogAppEvents=1"></script>
                    <div class="fb-like" data-href="{{ url("/detail/$dataDetail->slug") }}" data-width="" data-layout="standard" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                </div>

                <div id="fb-root" style="margin-top: 30px;">
                    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=382856608826640&autoLogAppEvents=1"></script> 
                    <div class="fb-comments" data-href="{{ url("/detail/$dataDetail->slug") }}" data-numposts="5"></div>
                </div>
            </div> <!--  finish rightcont-->
            
        </div>
    </div>
</div>

</div>
<script type="text/javascript" src="{{asset('')}}lib/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('')}}lib/OwlCarousel2-2.3.4/owl.carousel.min.js"></script>
<script type="text/javascript" src="{{asset('')}}js/carousel.js"></script>
@endsection
