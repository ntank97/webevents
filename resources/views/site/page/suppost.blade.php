@extends("site.master_layout")
@section("content")
<style type="text/css">
.div-suppost-1{
		margin-top: 50px;
		border-bottom: 1px solid #898989;
	}
.div-suppost-1 p {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
		opacity: 0.9;
	}
.div-suppost-1 h3 {
	color: red;
}
.category-title{
	margin-top: 50px;
}
	
		
	
	
</style>
<section class="main-contact">
		<div class="container" >
			<div class="div-suppost-1">
				<h3>Hỗ Trợ Khách Hàng</h3>
				<p>Công Ty TNHH Thiết Bị Máy Văn Phòng</p>
			
			
				<p>Tư Vấn 24/7</p>
				<p>Hotline: </p>
			
				</div>
			<div class="category-title">
				<h1>HỖ TRỢ KỸ THUẬT</h1>
			</div>   
			@foreach ($data as $support )
			<div class="category-products">
				<ul id="products-list" class="products-list">
					<li class="item odd">
						<div class="col-item">
							<div class="product_image">
								@php
									$dulieu = $support->thumbnail;
									$format = explode(".",$dulieu);
								@endphp
								@if($format[1] == 'mp4')
								<video width="310" height="240" style="margin-top: -28px;" controls>
									<source src="{{asset('')}}img/support/{{$support->thumbnail}}" type="video/mp4">
								</video>
								@else
								<div class="images-container">
									<a class="product-image" title="Sample Product" href="{{asset('')}}suppost/detailSP/{{$support->id_support}}">
										<img style="width:100%"  src="{{asset('')}}img/support/{{$support->thumbnail}}" class="img-responsive" alt="a" />
									</a>
								<div class="qv-button-container">
									<a class="qv-e-button btn-quickview-1" href="{{asset('')}}suppost/detailSP/{{$support->id_support}}"><span><span>Quick View</span></span></a>
								</div>
								</div>
								@endif
							</div>
							<div class="product-shop">
								<h2 class="product-name"><a title=" Sample Product" href="{{asset('')}}suppost/detailSP/{{$support->id_support}}">{{$support->title}}</a></h2>
								<div class="price-box">
									<ul class="list-info">

										<li><span class="icon-user">&nbsp;</span>
											@if($support->author_id ==1)
											{{$support->name}}
											@elseif($support->author_id ==2)
											{{$support->name}}
											@elseif($support->author_id ==3)
											{{$support->name}}
											@endif
										</li>	
										<li><span class="icon-time">&nbsp;</span>{{date('d-m-Y', strtotime($support->created_at))}}</li>
									</ul>
								</div>
								<div class="desc std">
								<p>{!!substr($support->content, 0,50)!!}</p>
								
							


								</div>
							</div>
						</div>
					</li>
				</ul>
			</div>
			
			@endforeach
			
				 <div style="display: flex; justify-content: center;align-items: center; padding: 3% 0">
          <ul class="pagination">
              {{ $data->links() }}
          </ul>
        </div>
		</div>
		<div class="phone_wrapper">
			<div class="icon">
			  <a href="tel:0816025678" class="link_phone"></a>
			</div>
		  </div>
	</section>
@endsection