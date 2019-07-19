
 @extends("site.master_layout")


 @section("content")

 
 <section class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
         <aside class="col-md-3 col-sm-12 col-xs-12">
          <div class="block block-layered-nav">
            <div class="block-title"><span>Giá Sản Phẩm</span></div>
            <div class="block-content"> 
              <dl id="narrow-by-list">
                <dt class="odd">Sắp Xếp Theo</dt>
                <div style="font-size: 15px; ">
                <dd class="odd">
                  <ol >
                    <li> <a href="{{url('tangdanink')}}"><span class="t-text t-active">Giá Tăng Dần</span></a>  </li>
                    <li> <a href="{{url('giamdanink')}}"><span class="t-text t-active">Giá Giảm Dần</span></a>  </li>
                    <li> <a href="{{url('azink')}}"><span class="t-text t-active">Từ A - Z</span></a>  </li>
                   
                  </ol>
                </dd>
                </div>
              </dl>
            </div>
          </div>
        </aside>
        <section  class="col-md-9 col-sm-12 col-xs-12">
          <div class="category-title">
            <h1>Mực </h1>
          </div>
          @if(isset($data))    
              @foreach($data as $linhkien)
              <div class="category-products">
            <ul id="products-list" class="products-list">
              <li class="item odd">
                <div class="col-item">
                  <div class="product_image"  >
                    <div class="images-container" style="display: flex;justify-content: center;align-items: center;"> <a class="product-image" title="Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> <img src="{{asset('')}}img/{{$linhkien->thumbnail}}" class="img-responsive" alt="" /> </a>
                      <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"><span><span>Quick View</span></span></a> </div>
                    </div>
                  </div>
                  <div class="product-shop" style="padding-left: 40px;">
                    <h2 class="product-name"><a title=" Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> {{$linhkien->name}} </a></h2>
                    <div class="price-box">
                                       @if($linhkien->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($linhkien->price)}} VND</span> </p>
                      @else
                        <p class="special-price"> <span class="price">{{number_format($linhkien->sale_price)}} VND</span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($linhkien->price)}} VND</span> </p>
                      @endif
                                  </div>
                    <div class="desc std">
                      <p>{!!substr($linhkien->description, 0,100)!!}</p>
                      <a href="{{asset('')}}linhkien/detail/{{$linhkien->id}}" class="btn btn-success">Read more &nbsp; <span class="icon icon-arrow-right-5"></span></a> 
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
          @elseif(isset($tangdan))    
              @foreach($tangdan as $linhkien)
              <div class="category-products">
            <ul id="products-list" class="products-list">
              <li class="item odd">
                <div class="col-item">
                  <div class="product_image">
                    <div class="images-container">
                     <a class="product-image" title="Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> 
                      <img src="{{asset('')}}img/{{$linhkien->thumbnail}}" class="img-responsive" alt="" />
                     </a>
                      <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"><span><span>Quick View</span></span></a> 
                      </div>
                    </div>
                  </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a title=" Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> {{$linhkien->name}} </a></h2>
                    <div class="price-box">
                                       @if($linhkien->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($linhkien->price)}} VND</span> </p>
                      @else
                      {{-- @php
                      $giahientai = $linhkien->price - $linhkien->sale_price;
                      @endphp --}}
                      
                      <p class="special-price"> <span class="price">{{number_format($linhkien->sale_price)}} VND</span> </p>
                      <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($linhkien->price)}} VND</span> </p>
                    @endif
                                  </div>
                    <div class="desc std">
                      <p>{!!substr($linhkien->description, 0,100)!!}</p>
                      <a href="{{asset('')}}linhkien/detail/{{$linhkien->id}}" class="btn btn-success">Read more &nbsp; <span class="icon icon-arrow-right-5"></span></a> 
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          
          @endforeach
           <div style="display: flex; justify-content: center;align-items: center; padding: 3% 0">
          <ul class="pagination">
              {{ $tangdan->links() }}
          </ul>
        </div>
          @elseif(isset($giamdan))    
              @foreach($giamdan as $linhkien)
              <div class="category-products">
            <ul id="products-list" class="products-list">
              <li class="item odd">
                <div class="col-item">
                  <div class="product_image">
                    <div class="images-container"> <a class="product-image" title="Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> <img src="{{asset('')}}img/{{$linhkien->thumbnail}}" class="img-responsive" alt="" /> </a>
                      <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"><span><span>Quick View</span></span></a> </div>
                    </div>
                  </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a title=" Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> {{$linhkien->name}} </a></h2>
                    <div class="price-box">
                                       @if($linhkien->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($linhkien->price)}} VND</span> </p>
                      @else
                        <p class="special-price"> <span class="price">{{number_format($linhkien->sale_price)}} VND</span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($linhkien->price)}} VND</span> </p>
                      @endif
                                  </div>
                    <div class="desc std">
                      <p>{!!substr($linhkien->description, 0,100)!!}</p>
                      <a href="{{asset('')}}linhkien/detail/{{$linhkien->id}}" class="btn btn-success">Read more &nbsp; <span class="icon icon-arrow-right-5"></span></a> 
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
          
          @endforeach
           <div style="display: flex; justify-content: center;align-items: center; padding: 3% 0">
          <ul class="pagination">
              {{ $giamdan->links() }}
          </ul>
        </div>
           @elseif(isset($az))    
              @foreach($az as $linhkien)
              <div class="category-products">
            <ul id="products-list" class="products-list">
              <li class="item odd">
                <div class="col-item">
                  <div  class="product_image">
                    <div class="images-container"> <a class="product-image" title="Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> <img  src="{{asset('')}}img/{{$linhkien->thumbnail}}" class="img-responsive" alt="" /> </a>
                      <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"><span><span>Quick View</span></span></a> </div>
                    </div>
                  </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a title=" Sample Product" href="{{asset('')}}linhkien/detail/{{$linhkien->id}}"> {{$linhkien->name}} </a></h2>
                    <div class="price-box">
                                       @if($linhkien->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($linhkien->price)}} VND</span> </p>
                      @else
                        <p class="special-price"> <span class="price">{{number_format($linhkien->sale_price)}} VND</span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($linhkien->price)}} VND</span> </p>
                      @endif
                                  </div>
                    <div class="desc std">
                      <p>{!!substr($linhkien->description, 0,100)!!}</p>
                      <a href="{{asset('')}}linhkien/detail/{{$linhkien->id}}" class="btn btn-success">Read more &nbsp; <span class="icon icon-arrow-right-5"></span></a> 
                    </div>
                  </div>
                </div>
              </li>
            </ul>
          </div>
         
          @endforeach
          <div style="display: flex; justify-content: center;align-items: center; padding: 3% 0">
          <ul class="pagination">
              {{ $az->links() }}
          </ul>
        </div>
          @endif


          
        </section>
       
      </div>
    </div>

      <div class="phone_wrapper">
      <div class="icon">
        <a href="tel:0816025678" class="link_phone"></a>
      </div>
    </div>
  </section>
  <!-- End Two columns content -->
  
 <!-- Footer -->

   
    
    
 @endsection