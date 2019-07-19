@extends('master-layout')
@section('content')

<div class="main">
        <div class=" row ">
            <div class="col-md-9 col-xs-12 rightcont">
                <div class="row large-columns-3 medium-columns- small-columns-1 row-masonry">
                    @foreach ($blogss as $blognew)
                    <div class="col-md-4 col-xs-12  post-item">
                        <div class="col-iner">
                            <div class="image-cover">
                                <a href="{!!route('interface-page-detail-new',['slug'=>$blognew->slug])!!}"> <img src="{!! asset('admin/img/'.$blognew->photo_cover) !!}"></a>
                            </div>
                            <div class="time">
                                <strong>
                                <?php \Carbon\Carbon::setLocale('vi')?>
                                <span style="max-width:60px;" style="font-size:15px ">{!! \Carbon\Carbon::createFromTimeStamp(strtotime($blognew->created_at))->diffforHumans() !!}</span><br>
                                {{-- <span style="font-size: 12px">Th5</span> --}}
                            </strong>
                            </div>
                            <div class="box-text text-center">
                                <h5><a href="{!!route('interface-page-detail-new',['slug'=>$blognew->slug])!!}"><p>{{$blognew->short_cut}}, [...]</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

            <div class="row">
                
                <div class="paginated">
                        {!! $blogss->links() !!}
                </div>
            </div>
        </div>

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
            </div>
            </div>

        </div>
    </div>
</div>

@endsection
