 <style>
  a.link_phone {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    width: 100%;
    height: 100%;
    border-radius: 50%;
    cursor: pointer;
  }
  @media (max-width: 768px){
    .phone_wrapper > .icon {
      position: fixed;
      z-index: 9999;
      top: 82%;
      left: 3%;
    }
  }
</style>
@extends("site.master_layout")
@section("content")
<div id="magik-slideshow" class="magik-slideshow">
  <div class="wow">
    <div id='rev_slider_4_wrapper' class='rev_slider_wrapper fullwidthbanner-container' >
      <div id='rev_slider_4' class='rev_slider fullwidthabanner'>
        
        <ul>
          @foreach ($slider as $slide )
            <li data-transition='random' data-slotamount='7' data-masterspeed='1000'><img style="width:1349px;height:580px;" src='{{asset("")}}img/slider/{{$slide->images}}' data-bgposition='left top' data-bgfit='cover' data-bgrepeat='no-repeat' alt="banner"/>
              <div class='tp-caption sfb  tp-resizeme ' data-x='15'  data-y='360'  data-endspeed='500'  data-speed='500' data-start='1500' data-easing='Linear.easeNone' data-splitin='none' data-splitout='none' data-elementdelay='0.1' data-endelementdelay='0.1' style='z-index:4; white-space:nowrap;'> 
            </li>
          @endforeach
            
              <div class="tp-bannertimer"></div>
              </div>
            </div>
          </div>
        </div>
        
        <section class="main-container col1-layout home-content-container">
          <div class="container">
            <div class="row">
              <div class="std">
                <div class="col-lg-8 col-xs-12 col-sm-8 best-seller-pro wow">
                  <div class="slider-items-products">
                    <div class="new_title center">
                      <h2>SẢN PHẨM ĐANG GIẢM GIÁ</h2>
                    </div>
                    <div id="best-seller-slider" class="product-flexslider hidden-buttons">
                      <div class="slider-items slider-width-col4"> 
                        <!-- Item -->
                        @foreach($sale as $sale)
                        <div class="item">
                          <div class="col-item">

                            <div class="sale-label sale-top-right">Sale</div>
                            <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$sale->id]) }}"> <img src="{{asset('')}}img/{{$sale->thumbnail}}" class="img-responsive" alt="product-image" /> </a>

                              <div class="qv-button-container"> <a href="{{ route('detail',['id'=>$sale->id]) }}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                            </div>
                            <div class="info">
                              <div class="info-inner">
                                <div class="item-title"> <a title=" Sample Product" href="{{ route('detail',['id'=>$sale->id]) }}" style="font-size: 16px;"> {{$sale->name}} </a> </div>
                                <!--item-title-->
                                <div class="item-content">

                                  <div class="price-box">
                                   @if($sale->sale_price == 0)
                                   <p class="special-price"> <span class="price">{{number_format($sale->price)}} VND</span> </p>
                                   @else
                                   <p class="special-price"> <span class="price">{{number_format($sale->sale_price)}} VND</span> </p>
                                   <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($sale->price)}} VND</span> </p>
                                   @endif
                                 </div>
                               </div>
                               <!--item-content--> 
                             </div>
                             <!--info-inner--> 
                             
                             <!--actions-->
                             <div class="clearfix"> </div>
                           </div>
                         </div>
                       </div>
                       @endforeach
                     </div>

                   </div>
                 </div>
               </div>
               <div class="col-lg-4 col-xs-12 col-sm-4 wow latest-pro small-pr-slider">
                <div class="slider-items-products">
                  <div class="new_title center">
                    <h2>Sản phẩm mới nhất</h2>
                  </div>
                  <div id="latest-deals-slider" class="product-flexslider hidden-buttons latest-item">
                    <div class="slider-items slider-width-col4"> 
                      <!-- Item -->
                      @foreach($pro_new as $pro_new)
                      <div class="item">
                        <div class="col-item">
                          <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$pro_new->id]) }}"> <img src="{{asset('')}}img/{{$pro_new->thumbnail}}" class="img-responsive" alt="product-image" /> </a>

                            <div class="qv-button-container"> <a href="{{ route('detail',['id'=>$pro_new->id]) }}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                          </div>
                          <div class="info">
                            <div class="info-inner">
                              <div class="item-title"> <a title=" Sample Product" href="{{ route('detail',['id'=>$pro_new->id]) }}">{{$pro_new->name}}</a> </div>
                              <!--item-title-->
                              <div class="item-content">

                                <div class="price-box">
                                  @if($pro_new->sale_price == 0)
                                  <p class="special-price"> <span class="price">{{number_format($pro_new->price)}} VND</span> </p>
                                  @else
                                  <p class="special-price"> <span class="price">{{number_format($pro_new->sale_price)}} VND</span> </p>
                                  <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($pro_new->price)}} VND</span> </p>
                                  @endif
                                </div>
                              </div>
                              <!--item-content--> 
                            </div>
                            <!--info-inner-->
                            
                            <!--actions-->
                            
                          </div>
                        </div>
                      </div>
                      @endforeach
                      <!-- End Item --> 
                      <!-- Item -->
                      
                      <!-- End Item --> 
                      <!-- Item -->
                      
                      <!-- End Item --> 
                      <!-- Item -->
                      
                      <!-- End Item --> 
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- End main container --> 
      
      <!-- recommend slider -->
      
      <!-- End Recommend slider --> 
      <!-- banner section -->

      <section class="featured-pro wow animated parallax parallax-2" id="product1" style="margin-bottom: 0;padding-bottom: 0">

        <section id="srcoll-printer" class="featured-pro wow animated parallax parallax-2">
          <div class="container">
            <div class="std">
              <div class="slider-items-products">
                <div class="featured_title center" style="border-bottom: 2px solid #ded4d4;">
                  <h2 style="height: 100%;line-height: 28px;margin-top: 1px;">Máy In</h2>
                  
                </div>
                <div id="featured-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4"> 
                    <!-- Item -->
                    @foreach($data as $pro)

                    <div class="item">
                      <div class="col-item">
                       
                        <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$pro->id]) }}"> <img src="{{asset('')}}img/{{$pro->thumbnail}}" class="img-responsive" alt="a" /> </a>
                         
                          <div class="qv-button-container"> <a href="{{ route('detail',['id'=>$pro->id]) }}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                        </div>
                        <div class="info">
                          <div class="info-inner">
                            <div class="item-title"> <a title=" Sample Product" href="{{ route('detail',['id'=>$pro->id]) }}" style="font-size: 16px;">{{$pro->name}}</a> </div>
                            <!--item-title-->
                            <div class="item-content">
                             
                              <div class="price-box">
                               @if($pro->sale_price == 0)
                               <p class="special-price"> <span class="price">{{number_format($pro->price)}} VND</span> </p>
                               @else
                               <p class="special-price"> <span class="price">{{number_format($pro->sale_price)}} VND</span> </p>
                               <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($pro->price)}} VND</span> </p>
                               @endif
                             </div>
                           </div>
                           <!--item-content--> 
                         </div>
                         <!--info-inner-->

                         <div class="clearfix"> </div>
                       </div>
                     </div>
                   </div>
                   @endforeach
                 </div>
               </div>
             </div>
           </div>
         </div>
       </section>

       <!-- End banner section --> 



       <!-- Featured Slider -->

       <section class="featured-pro wow animated parallax parallax-2" id="product2" style="margin-bottom: 0;padding-bottom: 0">

        <section id="srcoll-photo" class="featured-pro wow animated parallax parallax-2">

          <div class="container">
            <div class="std">
              <div class="slider-items-products">
                <div class="featured_title center" style="border-bottom: 2px solid #ded4d4;">
                  <h2 style="height: 100%;line-height: 28px;margin-top: 1px;">MÁY PHOTOCOPY </h2>
                </div>
                <div id="featured-slider" class="product-flexslider hidden-buttons">
                  <div class="slider-items slider-width-col4"> 
                    <!-- Item -->

                    <!-- End Item --> 
                    <!-- Item -->
                    @foreach($data2 as $photo)
                    <div class="item">
                      <div class="col-item">
                        {{-- <div class="sale-label sale-top-right">Sale</div> --}}
                        <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$photo->id]) }}"> <img src="{{asset('')}}img/{{$photo->thumbnail}}" class="img-responsive" alt="a" /> </a>
                         
                          <div class="qv-button-container"> <a href="{{ route('detail',['id'=>$photo->id]) }}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                        </div>
                        <div class="info">
                          <div class="info-inner">
                            <div class="item-title"> <a title=" Sample Product" href="{{ route('detail',['id'=>$photo->id]) }}" style="font-size: 16px;"> {{$photo->name}}</a> </div>
                            <!--item-title-->
                            <div class="item-content">
                             
                              <div class="price-box">
                                @if($photo->sale_price == 0)
                                <p class="special-price"> <span class="price">{{number_format($photo->price)}} VND</span> </p>
                                @else
                                <p class="special-price"> <span class="price">{{number_format($photo->sale_price)}} VND</span> </p>
                                <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($photo->price)}} VND</span> </p>
                                @endif
                              </div>
                            </div>
                            <!--item-content--> 
                          </div>
                          <!--info-inner-->

                          <div class="clearfix"> </div>
                        </div>
                      </div>
                    </div>
                    
                    @endforeach
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <section class="featured-pro wow animated parallax parallax-2" id="product3" style="margin-bottom: 0;padding-bottom: 0">

          <section id="srcoll-printer" class="featured-pro wow animated parallax parallax-2">
            <div class="container">
              <div class="std">
                <div class="slider-items-products">
                  <div class="featured_title center" style="border-bottom: 2px solid #ded4d4;">
                    <h2 style="height: 100%;line-height: 28px;margin-top: 1px;">Linh kiện </h2>
                    
                  </div>
                  <div id="featured-slider" class="product-flexslider hidden-buttons">
                    <div class="slider-items slider-width-col4"> 
                      <!-- Item -->
                      @foreach($data3 as $pro)

                      <div class="item">
                        <div class="col-item">
                         
                          <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$pro->id]) }}"> <img src="{{asset('')}}img/{{$pro->thumbnail}}" class="img-responsive" alt="a" /> </a>
                           
                            <div class="qv-button-container"> <a href="{{ route('detail',['id'=>$pro->id]) }}" class="qv-e-button btn-quickview-1"><span><span>Quick View</span></span></a> </div>
                          </div>
                          <div class="info">
                            <div class="info-inner">
                              <div class="item-title"> <a title=" Sample Product" href="{{ route('detail',['id'=>$pro->id]) }}" style="font-size: 16px;">{{$pro->name}}</a> </div>
                              <!--item-title-->
                              <div class="item-content">
                               
                                <div class="price-box">
                                 @if($pro->sale_price == 0)
                                 <p class="special-price"> <span class="price">{{number_format($pro->price)}} VND</span> </p>
                                 @else
                                 <p class="special-price"> <span class="price">{{number_format($pro->sale_price)}} VND</span> </p>
                                 <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($pro->price)}} VND</span> </p>
                                 @endif
                               </div>
                             </div>
                             <!--item-content--> 
                           </div>
                           <!--info-inner-->

                           <div class="clearfix"> </div>
                         </div>
                       </div>
                     </div>
                     @endforeach
                   </div>
                 </div>
               </div>
             </div>
           </div>
         </section>
         <div class="phone_wrapper">
          <div class="icon">
            <a href="tel:0816025678" class="link_phone"></a>
          </div>
        </div>

        <!-- End Featured Slider --> 
        @endsection

        @section("js")
        <script type='text/javascript'>
          jQuery(document).ready(function(){
            jQuery('#rev_slider_4').show().revolution({
              dottedOverlay: 'none',
              delay: 5000,
              startwidth: 1170,
              startheight: 580,

              hideThumbs: 200,
              thumbWidth: 200,
              thumbHeight: 50,
              thumbAmount: 2,

              navigationType: 'thumb',
              navigationArrows: 'solo',
              navigationStyle: 'round',

              touchenabled: 'on',
              onHoverStop: 'on',

              swipe_velocity: 0.7,
              swipe_min_touches: 1,
              swipe_max_touches: 1,
              drag_block_vertical: false,

              spinner: 'spinner0',
              keyboardNavigation: 'off',

              navigationHAlign: 'center',
              navigationVAlign: 'bottom',
              navigationHOffset: 0,
              navigationVOffset: 20,

              soloArrowLeftHalign: 'left',
              soloArrowLeftValign: 'center',
              soloArrowLeftHOffset: 20,
              soloArrowLeftVOffset: 0,

              soloArrowRightHalign: 'right',
              soloArrowRightValign: 'center',
              soloArrowRightHOffset: 20,
              soloArrowRightVOffset: 0,

              shadow: 0,
              fullWidth: 'on',
              fullScreen: 'off',

              stopLoop: 'off',
              stopAfterLoops: -1,
              stopAtSlide: -1,

              shuffle: 'off',

              autoHeight: 'off',
              forceFullWidth: 'on',
              fullScreenAlignForce: 'off',
              minFullScreenHeight: 0,
              hideNavDelayOnMobile: 1500,

              hideThumbsOnMobile: 'off',
              hideBulletsOnMobile: 'off',
              hideArrowsOnMobile: 'off',
              hideThumbsUnderResolution: 0,

              hideSliderAtLimit: 0,
              hideCaptionAtLimit: 0,
              hideAllCaptionAtLilmit: 0,
              startWithSlide: 0,
              fullScreenOffsetContainer: ''
            });
          });
        </script>
        @endsection
