 @extends("site.master_layout")
 @section("content")
 
 <div class="container"> 
			<div class="category-products">
				<ul id="products-list" class="products-list">
					<li class="item odd">
						<div class="col-item">
							<div class="product_image">
								<div class="images-container">
									@php
										$dulieu = $detailsp->thumbnail;
										$format = explode(".",$dulieu);
									@endphp
									@if($format[1] == 'mp4')
									<video width="310" height="240" style="" controls>
										<source src="{{asset('')}}img/support/{{$detailsp->thumbnail}}" type="video/mp4">
									</video>
									@else
									<img style="width:100%; object-fit: cover; height: 350px;"  src="{{asset('')}}img/support/{{$detailsp->thumbnail}}" class="img-responsive" alt="a" />
									@endif
								</div>
							</div>
							<div class="product-shop">
								<h2 class="product-name">{{$detailsp->title}}</h2>
							
								
								<div style="word-wrap: break-word;">
									<span>{!!$detailsp->content!!}</span>
								</div>
                			</div>
						</div>
					</li>
				</ul>
			</div>
      <div id="fb-root">
              <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=382856608826640&autoLogAppEvents=1"></script> 
              <div class="fb-comments" data-href="{{ url("suppost/detailSP/$detailsp->id_support") }}" data-numposts="5"></div>
            </div>
								</div>
                </div>
@endsection