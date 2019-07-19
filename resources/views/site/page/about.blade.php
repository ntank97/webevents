@extends("site.master_layout")
@section("content")
<!-- main-container -->
<div class="main-container col2-right-layout">
  <div class="main container">
    <div class="row">
      <section class="col-main col-sm-9 wow">
        @foreach ($data as $data)
        <div class="page-title">
          <h1 style="color: rgb(255, 0, 0);text-align: center; font-size: 25px;">{{$data->title}}</h1>
        </div>
        <div class="static-contain">
         <p>{{$data->text}}</p>
        </div>
        @endforeach
      </section>
      {{-- @include('site.aside') --}}
    </div>
  </div>
</div>
<div class="phone_wrapper">
  <div class="icon">
    <a href="tel:0816025678" class="link_phone"></a>
  </div>
</div>
@endsection