@extends("site.master_layout")
@section("content")
<section>
 <div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <div class="col-main col-sm-9">
        <div class="page-title">
          <h1> Dịch vụ Sửa chữa bảo dưỡng</h1>
        </div>
        @foreach($data as $data)
        <h2 class="blog_entry-title"> Địa chỉ : {{$data->address}} </h2> 
        <h2 class="blog_entry-title"> <a  href="tel:{{$data->phone}}">Số điện thoại bảo dưỡng :0{{$data->phone}}</a> </h2>
        <div class="entry-content">
          <p>{{$data->text}}.</p>
        </div>
        @endforeach
      </div>
    </header>
  </article>

</div>
</div>

</div>
</div>

</div>
</div>
</div>
</section>
@endsection

@section("js")