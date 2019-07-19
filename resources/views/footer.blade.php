<div class="footer"> <!--  start footer-->
    <div class="row">
        <div class="col-md-3 foot"> <!--  start foot1-->
            <div class="tieude">
                <span> THIẾT BỊ SỰ KIỆN</span>
            </div>
            <ul>
                @foreach ($deviceFooter as $value )
                    <li><a href="#">{{$value->title}}</a></li>
                @endforeach
            </ul>
        </div>   <!--  finish foot1-->
        <div class="col-md-3 foot"> <!--  start foot1-->
            <div class="tieude">
                    <span> Nhân sự sự kiện</span>
            </div>
            <ul>
                @foreach ($staffFooter as $value )
                    <li><a href="#">{{$value->title}}</a></li>
                @endforeach
            </ul>
        </div><!--  finish foot1-->
        <div class="col-md-3 foot"> <!--  start foot1-->
            <div class="tieude">
                <span> TỔ CHỨC SỰ KIỆN</span>
            </div>
            <ul>
                @foreach ($eventFooter as $value )
                    <li><a href="#">{{$value->title}}</a></li>
                @endforeach
            </ul>
        </div>   <!--  finish foot1-->
        <div class="col-md-3 foot"> <!--  start foot1-->
            <div class="tieude">
                <span>THÔNG TIN LIÊN HỆ</span>
            </div>
            @if($contact != null)
            <p>
                {{$contact->name_company}}
            </p>
            <p> {{$contact->address}}</p>
            <p {{$contact->store}}</p>
            <p>SĐT:  {{$contact->phone}}</p>
            <p>Email:  {{$contact->email}}</p>
            <p>Website:  {{$contact->site}}</p>
            @endif
        </div>
    </div>    <!--  finish foot1-->

    <div class=" bottom-footer">
        <div class="col-md-12">
            Thiết kế và duy trì bởi TALENT WINS
        </div>
    </div>
</div>
<section class="back-to-top">
    <div class="back-to-top-button"><i class="fas fa-angle-double-up"></i></div>
</section>
<script type="text/javascript" src="js/backtotop.js"></script>
