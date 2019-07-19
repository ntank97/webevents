<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>WEB SỰ KIỆN</title>
	<base href="{{asset('')}}">
	<link rel="stylesheet" href="">
	 <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<link rel="shortcut icon" type="image/x-icon" href="https://kenh14cdn.com/2018/4/13/photo-4-1523613034062930366784.jpg" />
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/bootstrap_4.0.0/css/bootstrap.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('css/reset-browser.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/fontawesome.5.7.2/css/all.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.carousel.min.css') }}">
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/OwlCarousel2-2.3.4/assets/owl.theme.default.min.css') }}">

	<link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/header.css') }}">
    <link rel="stylesheet" href="css/lienhe.css"/>

	<!-- Start WOWSlider.com HEAD section --> <!-- add to the <head> of your page -->
	<link rel="stylesheet" type="text/css" href="{{ asset('lib/banner-slider/engine1/style.css') }}" />
    <!-- End WOWSlider.com HEAD section -->

    <link rel="stylesheet" type="text/css" href="{{ asset('css/responsive.css') }}">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
	<script type="text/javascript" src="{{ asset('js/jquery-3.4.1.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('lib/bootstrap_4.0.0/js/bootstrap.min.js') }}"></script>
	<style>
		.main-right img{
			max-width: 100%;
		}
	</style>

</head>
<body>

@include('header')
@yield('content')
@include('footer')

</body>
</html>
