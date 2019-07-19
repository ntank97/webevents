 @extends("site.master_layout")
 @section("content")
<section class="main-container col2-left-layout">
    <div class="main container">
      <div class="row">
        <section class="col-main col-sm-9 col-xs-12 col-sm-push-3 wow">
          <div class="category-title" style="text-transform: uppercase;font-size: 20px;font-weight: 700;">
            @if(isset($title))
            {{$title}}
            @endif
          </div>    
          @if(isset($get))
          <div class="category-products">
            <ul id="products-list" class="products-list">
            	 @foreach($get as $value)
            	 
            	<li class="item odd">
                <div class="col-item">
                  <div class="product_image">
                    <div class="images-container"> <a class="product-image" title="Sample Product" href="{{ route('detail',['id'=>$value->id]) }}"> <img src="{{asset('')}}img/{{$value->thumbnail}}" class="img-responsive" alt="a" /> </a>
                      <div class="qv-button-container"> <a class="qv-e-button btn-quickview-1" href="{{ route('detail',['id'=>$value->id]) }}"><span><span>Quick View</span></span></a> </div>
                    </div>
                  </div>
                  <div class="product-shop">
                    <h2 class="product-name"><a title=" Sample Product" href="{{ route('detail',['id'=>$value->id]) }}">  {{$value->name}}  </a></h2>
                    <div class="price-box">
                                       @if($value->sale_price == 0)
                        <p class="special-price"> <span class="price">{{number_format($value->price)}} VND</span> </p>
                      @else
                        <p class="special-price"> <span class="price">{{number_format($value->sale_price)}} VND</span> </p>
                        <p class="old-price"> <span class="price-sep">-</span> <span class="price"> {{number_format($value->price)}} VND</span> </p>
                      @endif
                                  </div>
                    <div class="desc std">
                      <p>{!!substr($value->description, 0,100)!!}</p>
                      <a href="{{ route('detail',['id'=>$value->id]) }}" class="btn btn-success">Đọc Thêm &nbsp; <span class="icon icon-arrow-right-5"></span></a>
                     
                    </div>
                  </div>
                </div>
              </li>
              
              @endforeach
              
                     @endif
            </ul>
          </div>

       
        </section>
        
        <aside class="col-left sidebar col-sm-3 col-xs-12 col-sm-pull-9 wow">
          
          <div class="block block-layered-nav">
            <div class="block-title"><span>Lọc theo hãng</span></div>
            <div class="block-content">
              <dl id="narrow-by-list">
                
                
                
            
               {{--  <dt class="odd">Hãng</dt> --}}
                <dd class="odd">
                  <ol>
                     <li> <a href="{{ url("/product/1") }} " class="level0"><span style="font-size: 20px;">Máy In </span></a> 
                     <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_sale") }}"><strong>Máy Cho thuê</strong></a>
                      @foreach ($menu as $data)              
                      <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                       </li>
                       @endforeach
                      </ul>
                      <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_lease") }}"><strong>Máy Bán</strong></a>
                      @foreach ($menu as $data)              
                      <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                       </li>
                       @endforeach
                      </ul>   
                      </li>   
                       <li> <a href="{{ url("/product/2") }} " class="level0"><span style="font-size: 20px;">Máy Photocopy </span></a> 
                     <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_sale_pho") }}"><strong>Máy Cho thuê</strong></a>
                      @foreach ($menu as $data)              
                      <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                       </li>
                       @endforeach
                      </ul>
                      <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_lease_pho") }}"><strong>Máy Bán</strong></a>
                      @foreach ($menu as $data)              
                      <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                       </li>
                       @endforeach
                      </ul>   
                      </li>  
                  </ol>
                </dd>
                <div class="block-title"><span>Lọc theo giá</span></div>
            <div class="block-content">
              <dl id="narrow-by-list">
                 <dd class="odd">
                  <ol>
                     <ul style="font-size: 20px">Máy In
                     	<li><a href="{{ route('listbysale1',['type'=>$data->type]) }}">Giá từ 10 triệu trở xuống</a></li>
                     	<li><a href="{{ route('listbysale2',['type'=>$data->type]) }}">Giá từ 10 triệu đến 20 triệu</a></li>
                     	<li><a href="{{ route('listbysale3',['type'=>$data->type]) }}">Trên 20 triệu</a></li>
                     </ul>
                      <ul style="font-size: 20px">Máy Photo
                     	<li><a href="{{ route('listbysale4',['type'=>$data->type]) }}">Giá từ 10 triệu trở xuống</a></li>
                     	<li><a href="{{ route('listbysale5',['type'=>$data->type]) }}">Giá từ 10 triệu đến 20 triệu</a></li>
                     	<li><a href="{{ route('listbysale6',['type'=>$data->type]) }}">Trên 20 triệu</a></li>
                     </ul>

                     
                  </ol>
                </dd>
                
                
                
              </dl>
            </div>
          </div>
          </div>  

        </aside>
        
      </div>
      
    </div>
    <div class="phone_wrapper">
      <div class="icon">
        <a href="tel:0816025678" class="link_phone"></a>
      </div>
    </div>
      <div style="display: flex;justify-content: center;align-items: center;">
          <ul class="pagination">
           
              
              @if(Request::get('type')&&Request::get('status')&&Request::get('id_producer'))

                {!!  $get->appends(['type' => Request::get('type'),'status'=>Request::get('status'),'id_producer'=>Request::get('id_producer')])->links()  !!}
              @else
                {!!$get->links()!!}
              @endif
          
          </ul>
        </div>  
  </section>
@endsection

@section("js")