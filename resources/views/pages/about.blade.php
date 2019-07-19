@extends('master-layout')
@section('content')
    <div class="main">
    <div class="row">
        <div class=" row ">
            <div class="col-xs-12 col-sm-12 col-md-3 col-lg-3 main-left">
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
                <div class="content">
                    @if($introduce != null)
                    {!!$introduce->content!!}
                    @endif
                </div>

            </div>
        </div>

    </div>
</div>




@endsection
