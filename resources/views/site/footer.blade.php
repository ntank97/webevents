  <footer class="footer">
    <div class="brand-logo">
      <div class="container">
      </div>
    </div>
    <div class="footer-middle container">
      <div class="col-md-4 col-sm-4">
        <div class="footer-logo"><a href="{{ url("/") }}" title="Logo"><img src="{{asset("")}}my-images/images/logo_com.png" alt="logo" style="width: 188.5px;border-radius:50%;height: 149px;object-fit: contain;"></a></div>
       
        
      </div>
     
      <div class="col-md-4 col-sm-4">
        <h4>Liên hệ</h4>
        <div class="contacts-info">
          @foreach ($con as $con)
        <li style="margin-bottom:10px;"><i class="fa fa-map-marker" aria-hidden="true"></i><span class="font_about"> {{$con->address}}</span></li>
        <li style="margin-bottom:10px;"><i class="fa fa-phone" aria-hidden="true"  class=""></i><span  class="font_about" > HotLine: {{$con->phone}}  </span></li>
        <li style="margin-bottom:10px;"><i class="fa fa-envelope" aria-hidden="true"></i><span class="font_about"> Email: <a href="mailto: {{$con->mail}}" style="color:#ff6600; font-size: 16px;">{{$con->mail}} </a></span></li>
        <li style="margin-bottom:10px;"><i class="fa fa-home" aria-hidden="true"></i><span class="font_about"> Facebook: <a style="color:#ff6600;font-size: 16px;" href="{{$con->facebook}}">{{$con->facebook}}</span></a></li>
        </div>
           @endforeach
      </div>
      <div class="col-md-4 col-sm-4">
        <div id="fb-root"></div>
        <script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v3.2&appId=382856608826640&autoLogAppEvents=1"></script>
        <div class="fb-page" data-href="https://www.facebook.com/C%C3%B4ng-Ty-TNHH-TM-v%C3%A0-DV-%C4%90%E1%BB%A9c-Th%E1%BA%AFng-1110046649052676/" data-tabs="timeline" data-height="200" data-small-header="true" data-adapt-container-width="true" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/C%C3%B4ng-Ty-TNHH-TM-v%C3%A0-DV-%C4%90%E1%BB%A9c-Th%E1%BA%AFng-1110046649052676/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/C%C3%B4ng-Ty-TNHH-TM-v%C3%A0-DV-%C4%90%E1%BB%A9c-Th%E1%BA%AFng-1110046649052676/">Công Ty TNHH TM và DV Đức Thắng</a></blockquote></div>
      
    </div>
    <div class="footer-bottom container-fluid" style="text-align: center;border-top: 1px solid #d6a5a5; font-size:12px;">
      <div class="col-sm-12 col-xs-12 coppyright"> &copy; Bản quyền thuộc về Talent Win | Cung cấp bởi  Talent Win</div>
        
      </div>
    </div>
  </footer>
  <!-- End Footer --> 

<div class="social ">
  <ul>
  {{--   <li class="fb"><a href="#"></a></li>
 
    <li class="youtube"><a href="#"></a></li> --}}
  </ul>
</div>
