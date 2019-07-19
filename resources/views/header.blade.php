
  <nav class="nav-horizontal container-fluid" style="border-color:#fff;box-shadow:1px 1px 10px rgba(0,0,0,0.15);">
      <div class="nav-horizontal-container container d-flex justyfy-content-between">
            <div class="logo">
                    @if($logo!=null)
                    <img src="{!! asset('admin/img/'.$logo->thumbnail) !!}" alt="">
                    @endif
                </div>
          <div class="nav-horizontal-content">
              <ul class="nav-ul-lv-1">
                    <li><a href="{{ url('') }}">

                    </a></li>
                  <li><a href="{{ url('') }}">Trang chủ</a></li>
                  <li class="sanpham" style="position : unset">
                      <a href="{!!route('interface-intro')!!}">Về chúng tôi</a>
                  </li>
                  <li><a href="{!!route('interface-event')!!}">Tổ chức sự kiện</a></li>
                  <li>
                      <a href="{!!route('interface-device')!!}">Thiết bị sự kiện</a>
                  </li>
                  <li class="lienhe-led"><a href="{!!route('interface-staff')!!}">Nhân sự sự kiện</a></li>
                  <li class="lienhe-led">
                      <a href="{!!route('interface-news')!!}">Tin tức</a>

                  </li>
                  <li class="lienhe-led"><a href="{!!route('interface-team')!!}">our tem</a></li>
                  <li class="lienhe-led"><a href="{!!route('interface-contact')!!}">liên hệ
                      </a></li>
              </ul>
              <div class="menu-mobile-button">
                  <i class="fas fa-bars"></i>
              </div>
          </div>
      </div>
  </nav>
  <script type="text/javascript" src="js/nav-horizontal.js"></script>

  <section class="menu-mobile">
      <div class="menu-mobile-bg"></div>
      <div class="menu-mobile-box">
          <div class="menu-mobile-info">

          </div>
          <div class="menu-mobile-content">
              <div class="menu-left">
                  <div class="menu-left-title">
                      <h3>Menu</h3>
                  </div>
                  <div class="menu-left-content">

                      <ul class="menu-left-ul-lv-1">
                          <li><a href="{{ url('') }}">Trang chủ</a></li>
                          <li><a href="{!!route('interface-intro')!!}">Về chúng tôi</a></li>
                          <li><a href="{!!route('interface-event')!!}">Tổ chức sự kiện</a></li>
                          <li><a href="{!!route('interface-device')!!}">Thiết bị sự kiện</a></li>
                          <li><a href="{!!route('interface-staff')!!}">Nhân sự sự kiện</a></li>
                          <li><a href="{!!route('interface-news')!!}">tin tức</a></li>
                          <li><a href="{!!route('interface-team')!!}">our team</a></li>
                          <li><a href="{!!route('interface-contact')!!}">liên hệ</a></li>

                      </ul>

                  </div> <!-- menu-left-content -->
              </div> <!-- menu-left -->
              <script type="text/javascript" src="js/menu-left-js.js"></script>
          </div>
      </div>
      <script type="text/javascript" src="js/menu-mobile.js"></script>
  </section>
<div class="container-fluid">
    <div class="banner owl-carousel owl-theme">
        @foreach ($slider as $slide)
            <div class="item">
                <img style="max-width: 100%;object-fit: contain;height:100%" src="{!! asset('admin/img/'.$slide->thumbnail) !!}" alt="">
            </div>
        @endforeach
    </div>
</div>