        
        <div class="col-right sidebar col-sm-3">
          <div role="complementary" class="widget_wrapper13" id="secondary">
            <div class="popular-posts widget widget__sidebar wow" id="recent-posts-4">
              <h3 class="widget-title"><span>BÀI VIẾT MỚI NHẤT</span></h3>
              <div class="widget-content">
                <ul class="posts-list unstyled clearfix">
            
                @foreach($data as $blog)
                  <li>
                    <figure class="featured-thumb"> <a href="{{asset('')}}blogs/detail/{{$blog->id}}"> <div class="meo" alt="blog image" style="background: url('{{asset('')}}img/blog/{{$blog->thumbnail}}'); width: 120px; height: 100px;background-size: cover;object-fit: cover;"></div> </a> </figure>
                    <!--featured-thumb-->
                    <h4><a title="Pellentesque habitant morbi" href="{{asset('')}}blogs/detail/{{$blog->id}}">{{$blog->title}}</a></h4>
                    <p class="post-meta"><i class="icon-calendar"></i>
                      <time datetime="2014-07-10T06:53:43+00:00" class="entry-date">{{date('d-m-Y', strtotime($blog->created_at))}}</time>
                      </p>
                  </li>
                  @endforeach
                </ul>
              </div>
              <!--widget-content-->
            </div>
                  <!-- Categories -->
            <!-- <div class="popular-posts widget widget_categories wow" id="categories-2">
              <h3 class="widget-title"><span>Categories</span></h3>
              <ul>
                <li class="cat-item cat-item-19599"><a href="#/first-category">First Category</a></li>
                <ul>
                </ul>
                <li class="cat-item cat-item-19599"><a href="#/second-category">Second Category</a></li>
                <ul>
                </ul>
              </ul>
            </div> -->
            <!-- Banner Ad Block -->

            <!-- <div class="ad-spots widget widget__sidebar">
              <h3 class="widget-title"><span>Ad Spots</span></h3>
              <div class="widget-content"><a target="_self" href="#" title=""><img alt="offer banner" src="{{ asset('') }}my-images/images/RHS-banner-img.jpg"></a></div>
            </div> -->


            <!-- Banner Text Block -->
            <!-- <div class="text-widget widget widget__sidebar">
              <h3 class="widget-title"><span>Text Widget</span></h3>
              <div class="widget-content">Mauris at blandit erat. Nam vel tortor non quam scelerisque cursus. Praesent nunc vitae magna pellentesque auctor. Quisque id lectus.<br>
                <br>
                Massa, eget eleifend tellus. Proin nec ante leo ssim nunc sit amet velit malesuada pharetra. Nulla neque sapien, sollicitudin non ornare quis, malesuada.</div>
            </div> -->
          </div>
        </div>