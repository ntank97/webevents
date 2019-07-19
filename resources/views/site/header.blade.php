  <style>
      .hotline{}
      .hotline a{
      display: inline-block;
      width: 100%;
      /* height: 100%; */
      margin-left: 110px;
      background-color: white;
      border-radius: 5px;
      padding: 16px 0;
      position: relative;
      margin-top: 34px;
      text-align: center;
      border: 1px solid #de0505;
  }
      .hotline span:nth-child(1){
      display: inline-block;
      font-weight: 500;
      color: #de0505;
  }
      .hotline span:nth-child(2){
      position: absolute;
      top: -11px;
      left: 33px;
      background-color: #fcfdff;
      display: inline-block;
      font-weight: 900;
      color: #de0505;
  }
      .hotline span:nth-child(3) img{
      width: 36px;
      height: 36px;
      object-fit: cover;
      /* position: absolute; */
      /* top: -14px; */
      /* left: 0; */
  }
      .hotline span:nth-child(3){
      display: inline-block;
      position: absolute;
      top: -13px;
      left: -12px;
      background: white;
  }
  @media (max-width: 768px){
  .hotline{
    display:none;
  }
  }
  </style>
 
  <header class="header-container">
    <div style = "border-bottom:0.1px solid #ff0808;min-height: 120px; background: url('{{asset('')}}img/banner/{{$banner->images}}'); background-repeat: no-repeat;
    background-size: cover;
    background-position: center;">
    </div>
      <div class="header container">
        <div class="row">
          <div class="col-lg-1 col-sm-1 col-md-1 col-xs-12"> 
            <!-- Header Logo --> 
            <a class="logo" title="" href="{{ url("/") }}"><img alt="" src="{{asset("")}}my-images/images/logo_com.png" style="width: 200px;height: 85px;object-fit: contain;"></a> 
            <!-- End Header Logo --> 
          </div>
          <div class="hotline col-lg-3 col-sm-3 col-md-3 col-xs-12">
              <a href="tel:0816025678">
                <span>0816025678</span>
                <span>Kinh Doanh</span>
                <span class="call"><img src="{{asset("")}}/img/logo/phone.png" alt=""></span>
              </a>            
          </div>
          <div class="hotline col-lg-3 col-sm-3 col-md-3 col-xs-12">
              <a href="tel:0816025678">

                <span>0816025678</span>
                <span>CHKH</span>
                <span class="call"><img src="{{asset("")}}/img/logo/phone.png" alt=""></span>
              </a>
              
          </div>
          <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12"> 
            <!-- Search-col -->
            <div class="search-box" style="margin-top: 43px;">

              <form action="{{route('searchProduct')}}" method="GET" id="search_mini_form">
               {{csrf_field()}}

              <form action="{{'/search'}}" method="GET" id="search_mini_form" name="Categories">
               

                <input type="text" placeholder="Search here..." value="" maxlength="70" class="" name="search" id="search">
             
                <button id="submit-button" class="search-btn-bg"><span>Search</span></button>
              </form>
            </div>
            <!-- End Search-col --> 
          </div>
         
         
          </div>
          <!-- End Top Cart --> 
        </div>
      </div>
    </header>