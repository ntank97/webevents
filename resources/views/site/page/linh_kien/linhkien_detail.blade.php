

<style>
  
</style>
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
                    <img  src="{{asset('')}}img/{{$item->thumbnail}}" alt="" style="width: 100%;height: auto;object-fit: cover;">
                </div>   
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
                  <div class="product-collateral">
              <div class="col-sm-12 wow">
                <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                  <li class="active"> <a href="#product_tabs_description" data-toggle="tab"> Mô tả sản phẩm </a> </li>
                  
                </ul>
                <div id="productTabContent" class="tab-content">
                  <div class="tab-pane fade in active" id="product_tabs_description">
                    <div class="std">
                      <p>{!!($item->product_details)!!}</p>
                    </div>
                  </div>
                     
                </div>
              </div>                  
            </div>
                  
                
                </div>
               </div>
               
              {{-- </div> --}}

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