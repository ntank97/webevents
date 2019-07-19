<link rel="stylesheet" href="{{asset('')}}/admin/product-detail/css/normalize.css" />
<link rel="stylesheet" href="{{asset('')}}/admin/product-detail/css/foundation.css" />
<link rel="stylesheet" href="{{asset('')}}/admin/product-detail/css/demo.css" />
<script src="{{asset('')}}/admin/product-detail/js/vendor/modernizr.js"></script>
<script src="{{asset('')}}/admin/product-detail/js/vendor/jquery.js"></script>
<!-- xzoom plugin here -->
<script type="text/javascript" src="{{asset('')}}/admin/product-detail/js/xzoom.min.js"></script>
<link rel="stylesheet" type="text/css" href="{{asset('')}}/admin/product-detail/css/xzoom.css" media="all" /> 
<!-- hammer plugin here -->
<script type="text/javascript" src="{{asset('')}}/admin/product-detail/hammer.js/1.0.5/jquery.hammer.min.js"></script>  
<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
<link type="text/css" rel="stylesheet" media="all" href="{{asset('')}}/admin/product-detail/fancybox/source/jquery.fancybox.css" />
<link type="text/css" rel="stylesheet" media="all" href="{{asset('')}}/admin/product-detail/magnific-popup/css/magnific-popup.css" />
<script type="text/javascript" src="{{asset('')}}/admin/product-detail/fancybox/source/jquery.fancybox.js"></script>
<script type="text/javascript" src="{{asset('')}}/admin/product-detail/magnific-popup/js/magnific-popup.js"></script>    
@extends("site.master_layout")
@section("content")
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
        <div class="row">
          <div class="product-view wow">
            @foreach($data as $item)
            <div class="product-essential">
              {{-- <div id="product_addtocart_form"> --}}
                <div class="product-img-box col-lg-6 col-sm-6 col-xs-12 ">
                  {{-- <div >
                      <img  src="{{$item->thumbnail}}" alt="" style="width: 330px;height: 300px;object-fit: contain;">
                  </div>
                  <div style="margin-top:30px;">
                    <img src="{{$item->thumbnail}}" alt="" style="width: 75px;height: 75px;object-fit: contain;">
                    <img src="{{$item->thumbnail}}" alt="" style="width: 75px;height: 75px;object-fit: contain;">
                    <img src="{{$item->thumbnail}}" alt="" style="width: 75px;height: 75px;object-fit: contain;">
                  </div> --}}
                  <section id="magnific">
                    <div class="row">
                      <div class="large-5 column" style="width: 100%;">
                        <div class="xzoom-container">
                          <img class="xzoom5" id="xzoom-magnific" src="{!! asset('img/'.$item->thumbnail) !!}" xoriginal="{!! asset('img/'.$item->thumbnail) !!}" />
                          <div class="xzoom-thumbs">
                            <a href="{!! asset('img/'.$item->thumbnail) !!}"><img class="xzoom-gallery5" width="80" src="{!! asset('img/'.$item->thumbnail) !!}"  xpreview="{!! asset('img/'.$item->thumbnail) !!}" title=""></a>
                            @foreach ($dataProductDetail as $productDetail)
                              @if($productDetail->product_id == $item->id)
                              {{-- <a href="{!! asset('detail/img/'.$productDetail->link) !!}"><img class="xzoom-gallery5" width="80" src="{!! asset('detail/img/'.$productDetail->link) !!}"  xpreview="{!! asset('detail/img/'.$productDetail->link) !!}" title="The description goes here"></a> --}}
                                <a href="{!! asset('detail/img/'.$productDetail->link) !!}"><img class="xzoom-gallery5" width="80" src="{!! asset('detail/img/'.$productDetail->link) !!}" title=""></a>
                              @endif
                            @endforeach
                            {{-- <a href="{{$item->thumbnail}}"><img class="xzoom-gallery5" width="80" src="{{$item->thumbnail}}"  xpreview="{{$item->thumbnail}}" title="The description goes here"></a>
                            <a href="{{$item->thumbnail}}"><img class="xzoom-gallery5" width="80" src="{{$item->thumbnail}}"  xpreview="{{$item->thumbnail}}" title="The description goes here"></a> --}}
                            {{-- <a href="{{$item->thumbnail}}"><img class="xzoom-gallery5" width="80" src="{{$item->thumbnail}}" title="The description goes here"></a>
                            <a href="{{$item->thumbnail}}"><img class="xzoom-gallery5" width="80" src="{{$item->thumbnail}}" title="The description goes here"></a>
                            <a href="{{$item->thumbnail}}"><img class="xzoom-gallery5" width="80" src="{{$item->thumbnail}}" title="The description goes here"></a> --}}
                            
                          </div>
                        </div>        
                      </div>
                      <div class="large-7 column"></div>
                    </div>
                  </section>   
                    
                </div>
                
{{--                 
                end: more-images --}}
                
                <div class="product-shop col-lg-6 col-sm-6 col-xs-12">
                  <div class="product-name">
                    <h1>{{$item->name}}</h1>
                  </div>
                  @if($item->sale_price !== 0)
                  <p class="availability in-stock"><span>Sale</span></p>
                  @endif
                  <div class="price-block">
                    <div class="price-box">
                      @if($item->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($item->price)}} VND</span> </p>
                      @else
                        <p class="special-price"> <span class="price">{{number_format($item->sale_price)}} VND</span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($item->price)}} VND</span> </p>
                      @endif
                  </div>
                  
                
                </div>
               </div>
               
              <!-- {{-- </div> --}} -->

            </div>

            <div class="product-collateral">
              <div class="col-sm-12 wow">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a> </li>
                  <li class=""> <a href="#product_tabs_specifications" data-toggle="tab"> Thông số kỹ thuật </a> </li>
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p style="font-size:14px">{!!($item->description)!!}</p>
                    </div>
                  </div>
                     <div class="tab-pane fade  " id="product_tabs_specifications">
                    <div class="std">
                      <p>{!!($item->product_details)!!}</p>
                    </div>
                  </div>
                  
                
                 
               
                </div>
              </div>           
    </div>
    @endforeach
  </div>
</div>
</div>
</div>
<div class="phone_wrapper">
  <div class="icon">
    <a href="tel:0816025678" class="link_phone"></a>
  </div>
</div>
  </section>
@endsection
<script src="{{asset('')}}/admin/product-detail/js/foundation.min.js"></script>
<script src="{{asset('')}}/admin/product-detail/js/setup.js"></script>