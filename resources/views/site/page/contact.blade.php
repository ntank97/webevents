@extends("site.master_layout")
@section("content")
<style type="text/css">
	p {
		font-family: Arial, Helvetica, sans-serif;
		font-size: 14px;
	}
	.div-contac-1{
		border-bottom: 1px solid #898989;

	}
	.div-contac-1 h3{
		color: #dc3333;
		font-size: 20px;
		
	}
	.div-contac-1 p {
		
		color: ##101010;
		
		padding-top: 10px;
	}
	.div-contac-2{
		margin-top: 20px;
	}
	.div-contac-2 p{ 
		
		
	}
	.div-contac-2 p i {
		padding: 9px 10px 12px 0px;
		color: #dc3333;
	}
	ul a {
		font-size: 14px;
	}
	.row {
		/*text-align: center;*/

	}
		


</style>

<section class="main-contact" style = "margin-bottom:60px;">
		<div class="container" >
			<div class="div-contac-1">
				<h3>Thông tin liên hệ:</h3>
				<p style="font-size: 15px;font-weight: 900;text-transform: capitalize;">{{$contact->name}}</p>
			</div>
			<div class="div-contac-2">
				<p><i class="fas fa-map-marker-alt"></i> Địa chỉ: {{$contact->address}}</p>
				<p><i class="fas fa-phone"></i> Kinh Doanh:{{$contact->phone}}</p>
				<p><i class="fas fa-envelope"></i> Email: {{$contact->mail}}</p>
				<p><i class="fab fa-facebook-square"></i> Facebook: {{$contact->facebook}}</p>
				<p><i class="fas fa-home"></i> Website: {{$contact->description}}</p>
			</div>
			<div >
							<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3723.5226273778962!2d105.77859941482083!3d21.0517785923682!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x313454d3163a8313%3A0x91395517a71598fb!2sChung+c%C6%B0+Green+Star!5e0!3m2!1sen!2s!4v1552986595563" width="100%" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
			</div>
		</div>
	</section>
	<div class="phone_wrapper">
		<div class="icon">
		  <a href="tel:0816025678" class="link_phone"></a>
		</div>
	  </div>
	
@endsection