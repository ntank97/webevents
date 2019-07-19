
@extends("site.master_layout")
@section("content")
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="page-title">
          <h2>Blog</h2>
        </div>
        <div class="blog-wrapper" id="main">
          <div class="posts-isotope row"> 
            <!-- Blog post -->
            @foreach($data as $blog)
            <div class="col-sm-6 col-md-6">
              <article class="container-paper-table">
                <div class="title">
                  <h2 class="entry-title"><a href="{{asset('')}}blogs/detail/{{$blog->id}}">{{$blog->title}}</a></h2>
                </div>
                <div class="post-container" style="background-color: #f2f2f2;"> <a href="{{asset('')}}blogs/detail/{{$blog->id}}"><img style="height: 288.92px; width: 100%;object-fit: cover;  !important;" class="img-responsive" src="{{asset('')}}img/blog/{{$blog->thumbnail}}" alt=""></a>
                  <div class="price-box">
                    <ul class="list-info">
                      
                    <li><span class="icon-user">&nbsp;</span>@if($blog->role == 1  ) {{$blog->name}} @elseif($blog->role == 3){{$blog->name}}@endif</li>
                      <li><span class="icon-time">&nbsp;</span>{{date('d-m-Y', strtotime($blog->created_at))}}</li>
                    </ul>
                    
                    <a href="{{asset('')}}blogs/detail/{{$blog->id}}" class="btn btn-success">Read more &nbsp; <span class="icon icon-arrow-right-5"></span></a>
                   
                  </div>
                </div>
              </article>
            </div>
            @endforeach
            <!-- //end Blog post --> 
            <!-- Pagination -->
           
            <!-- //end Pagination --> 
          </div>  
        </div>
        <div style="margin-left: 50%;">
          <ul class="pagination">
              {{ $data->links() }}
          </ul>
        </div>
      </div>
      @include('site.blog_aside')
    </div>
  </div>
</div>
<div class="phone_wrapper">
  <div class="icon">
    <a href="tel:0816025678" class="link_phone"></a>
  </div>
</div>
@endsection