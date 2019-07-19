<nav>
    <div class="container" >
      <div class="nav-inner"> 
        <!-- mobile-menu -->
        <div class="hidden-desktop" id="mobile-menu">
          <ul class="navmenu">
            <li>
              <div class="menutop">
                <div class="toggle"> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></div>
                <h2>Menu</h2>
              </div>
              <ul style="display:none;" class="submenu">
                <li>
                  <ul class="topnav">
                    <li class="level1 nav-6 level-top "> <a class="level-top" href="{{ url("/") }}"> <span>TRANG CHỦ</span> </a>
                    </li>
                    <li id="nav-product" class="level0 nav-6 level-top"> <a class="level-top" href=""> <span>Dịch vụ</span> </a>

                     <ul>
                       <li><a href="{{ url("/product/1") }} " style="font-size: 20px;color: #1212b4;">Máy In</a>
                        <ul>
                          <li><a href="{{ url("/product/list_in_sale") }}" style="font-size: 16px;color:red; ">Cho thuê</a>
                           <ul>
                             @foreach ($menu as $data)   
                             <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                             </li>
                             @endforeach
                           </ul>
                         </li>

                         <li><a href="{{ url("/product/list_in_lease") }}"style="font-size: 16px;color:red;">Máy bán</a>
                          <ul>
                           @foreach ($menu as $data)   
                           <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                           </li>
                           @endforeach
                         </ul>
                       </li>
                     </ul>
                   </li>
                   <li><a href="{{ url("/product/2") }}"  style="font-size: 20px;color: #1212b4;">Máy Photo</a>
                     <ul>
                      <li><a href="{{ url("/product/list_in_sale_pho") }}"style="font-size: 16px;color:red;">Cho thuê</a>
                       <ul>
                         @foreach ($menu as $data)   
                         <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                         </li>
                         @endforeach
                       </ul>
                     </li>

                     <li><a href="{{ url("/product/list_in_lease_pho") }}"style="font-size: 16px;color:red;">Máy bán</a>
                      <ul>
                       @foreach ($menu as $data)   
                       <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                       </li>
                       @endforeach
                     </ul>
                   </li>
                 </ul>
               </li>
               <li><a href="{{ url("/linhkien") }}"><span style="font-size: 20px;color: #1212b4;">Dịch vụ</span></a>
                 <ul>
                   <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/linhkien/ink")}}">Đổ mực máy in<span></span></a>
                    </li>
                    <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/linhkien")}}">Linh kiện khác<span></span></a>
                    </li>
                    <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/maintenance")}}">Sửa chữa bảo dưỡng<span></span></a>
                    </li>
                    <li class="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("product/saleall")}}">Dịch vụ ưu đãi<span></span></a>
                    </li>
                 </ul>
               </li>
             </ul>
           </li>  
           <li class="level0 nav-7 level-top parent"> <a class="level-top" href="{{ url("about") }}"> <span>GIỚI THIỆU</span> </a> </li>
           <li class="level0 nav-8 level-top parent"> <a class="level-top" href="{{url("blogs")}}"> <span>TIN TỨC</span> </a> </li>
           <li class="level0 nav-8 level-top parent"> <a class="level-top" href="{{url("suppost")}}"> <span>HỖ TRỢ</span> </a> </li>

           <li class="level0 nav-9 level-top last parent "> <a class="level-top" href="{{ url("contact") }}"> <span>LIÊN HỆ</span> </a> </li>
         </ul>
       </li>
     </ul>
   </li>
 </ul>
 <!--navmenu--> 
</div>
<!--End mobile-menu --> 
<a class="logo-small" title="" href="{{ url("/") }}"><img style="width:34px;height:27px;border-radius:50%;" alt="Magento Commerce" src="{{asset("")}}my-images/images/logo_com.png" style="width: 100px;height: 30px;object-fit: contain;

"></a>
<ul id="nav" class="hidden-xs">
  {{--  <li class="level0 parent drop-menu"><a href="{{ url("/") }}" class="{{ Request::is('/') ? 'active' : 'null' }}"><span>TRANG CHỦ</span> </a>  --}}
    <li>
     <li class="level0 nav-5 level-top first"> <a class="level-top {{ Request::is('/') ? 'active' : 'null' }}}" href="{{ url("/") }}"> <span>TRANG CHỦ</span> </a>
     </li>
     <li class="level0 nav-5 level-top first"> <a href="" class="level-top "> <span>Dịch vụ</span> </a>
      <div class="level0-wrapper dropdown-6col" style="display:none;">
        <div class="level0-wrapper2">
          <div class="nav-block nav-block-center grid12-8 itemgrid itemgrid-4col">
            <ul class="level0">

             <li> <a href="{{ url("/product/1") }} " class="level0"><span style="font-size: 20px;">Máy In </span></a> 
               <ul id="printer" class="level1 nav-6-1 parent itemt" ><a href="{{ url("/product/list_in_sale") }}"><strong> Cho thuê máy In</strong></a>
                @foreach ($menu as $data)              
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                </li>
                @endforeach
              </ul>
              <ul id="printer" class="level1 nav-6-1 parent itemt" ><a href="{{ url("/product/list_in_lease") }}"><strong> Bán Máy In</strong></a>
                @foreach ($menu as $data)              
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>1,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
                </li>
                @endforeach
              </ul>
              <div class="clear:both;"></div>
            </li>

            <li> <a href="{{ url("/product/2") }} " class="level0"><span style="font-size: 20px;">Máy Photocopy </span></a> 
             <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_sale_pho") }}"><strong> Cho thuê máy Photo</strong></a>
              @foreach ($menu as $data)              
              <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>2,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
              </li>
              @endforeach
            </ul>
            <ul id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ url("/product/list_in_lease_pho") }}"><strong> Bán máy Photo</strong></a>
              @foreach ($menu as $data)              
              <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{ route('producer',['type'=>2,'status'=>1,'id_producer'=>$data->id_producer]) }}"><span>{{$data->name_producer}}</span></a>
              </li>
              @endforeach
            </ul>
          </li>
          <li> <a href="{{ url("/linhkien ") }}"><span style="font-size: 20px;">Dịch vụ</span></a>
            <ul id="printer" class="level1 nav-6-1 parent itemt">
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/linhkien/ink")}}"><span>Đổ mực máy in</span></a></li>
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/linhkien")}}"><span>Linh kiện khác</span></a></li>
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/maintenance")}}"><span>Sửa chữa bảo dưỡng</span></a></li>
                <li id="printer" class="level1 nav-6-1 parent itemt"><a href="{{url("/product/saleall")}}"><span>Dịch vụ ưu đãi</span></a></li>
                </ul>
            </li>
        </ul>
            </div>
          </div>
        </div>
      </li>
      <li class="level0 nav-5 level-top first"> <a class="level-top {{ Request::is('about') ? 'active' : '' }}" href="{{ url("about") }}"> <span>GIỚI THIỆU</span> </a>
      </li> 
      <li class="level0 nav-5 level-top first"> <a class="level-top {{ Request::is('blogs') ? 'active' : '' }}" href="{{url("blogs")}}"> <span>TIN TỨC</span> </a>
      </li> 

      {{-- <li class="level0 nav-8 level-top parent"> <a class="level-top" href="{{url("suppost")}}"> <span>HỖ TRỢ</span> </a> </li> --}}

      <li class="level0 nav-8 level-top parent"> <a class="level-top {{ Request::is('suppost') ? 'active' : '' }}" href="{{url("suppost")}}"> <span>HỖ TRỢ</span> </a> </li>
      <li class="level0 nav-5 level-top first"> <a class="level-top {{ Request::is('contact') ? 'active' : '' }}" href="{{ url("contact") }}"> <span>LIÊN HỆ</span></a>

      </li>


    </ul>
  </div>
</div>
</nav>
