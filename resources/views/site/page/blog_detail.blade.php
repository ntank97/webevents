 @extends("site.master_layout")
 @section("content")
 
 <div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9 wow">
        
        <div class="page-title">
          <h2>Blog</h2>
        </div>
        <div class="blog-wrapper" id="main">
          <div class="site-content" id="primary">
            <div role="main" id="content">
              <article class="blog_entry clearfix" id="post-29">
                <header class="blog_entry-header clearfix">
                  <div class="blog_entry-header-inner">
                    <h2 class="blog_entry-title">{{$data->title}} </h2>
                  </div>
                  
                  <!--blog_entry-header-inner--> 
                </header>
                <!--blog_entry-header clearfix-->
                <div class="entry-content">
                  <div  class="featured-thumb">
                    <a href="#"><img style="width: 100%;height: auto;object-fit: cover;"  alt="blog-img4" src="{{asset('')}}img/blog/{{$data->thumbnail}}"></a>
                  </div>
                  <div class="entry-content">
                    <p>{!!$data->content!!}</p>
                  </div>
                </div>
                
                <footer class="entry-meta"> This entry was posted	in <a rel="category tag" title="View all posts in First Category" href="#first-category">First Category</a> On
                  <time datetime="2014-07-10T06:53:43+00:00" class="entry-date">{{date('d-m-Y', strtotime($data->created_at))}}</time>
                . </footer>
              </article>
              <div id="fb-root">
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=382856608826640&autoLogAppEvents=1"></script> 
              <div class="fb-comments" data-href="{{ url("blogs/detail/$data->id") }}" data-numposts="5"></div>
            </div>
          </div>
        </div>
      </div>
      
    </div>
  </div>
</div>
@endsection