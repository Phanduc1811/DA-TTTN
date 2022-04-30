<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vật tư</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Lora:400,400i,700,700i&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/open-iconic-bootstrap.min.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/animate.css">

    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/owl.carousel.min.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/magnific-popup.css">

    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/aos.css">

    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/ionicons.min.css">

    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/jquery.timepicker.css">


    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/flaticon.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/icomoon.css">
    <link rel="stylesheet" href="{{ URL::asset('resources/css_js_user/') }}/css/style.css">
</head>

<body class="goto-here">
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-phone2"></span></div>
                            <span class="text">0866530401</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span
                                    class="icon-paper-plane"></span></div>
                            <span class="text">youremail@email.com</span>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('layout/Navbar/navbarUser')
    <!-- END nav -->
    @include('layout/Navbar/slideUser')


    <section class="ftco-section">
		 <form action="{{URL::to('/add-to-cart.php')}}" method='post' id="{{$vt->MaVT}}">
		 {!! csrf_field() !!}
            <input type='hidden' name='product_id' value='{{$vt->MaVT}}'>
			<div class="container">
				<div class="row">
					<div class="col-lg-6 mb-5 ftco-animate">
						<a href="{{ URL::asset('resources/css_js_user/') }}/images/{{$vt->Anh}}" class="image-popup"><img src="{{ URL::asset('resources/css_js_user/') }}/images/{{$vt->Anh}}" class="img-fluid"
								alt="Colorlib Template"></a>
					</div>
					<div class="col-lg-6 product-details pl-md-5 ftco-animate">
						<h3>{{$vt->TenVT}}</h3>
						<div class="rating d-flex">
							@foreach ($nsx as $item)
							<p class="text-left mr-4">
								Nhà Sản Xuất{{$item->TenNSX}}
							</p>
							@endforeach
							
							
							<p class="text-left">
								Đvt:{{$vt->DVTinh}}
							</p>
						</div>
						<p class="price"><span>{{number_format($vt->DonGia)}}VNĐ</span></p>
						<p>Miêu tả Nếu có</p>
						<div class="row mt-4">
							<div class="col-md-6">
								<input type="number" name="qty_pro" value="1" min="1" max="100" class="form-control" >
								<br>
								<p><a href="javascript:;" type="submit" onclick="document.getElementById('{{$vt->MaVT}}').submit()" class="btn btn-black py-3 px-5">Add to Cart</a></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</form>
	</section>

	<section class="ftco-section">
		<div class="container">
			<div class="row justify-content-center mb-3 pb-3">
				<div class="col-md-12 heading-section text-center ftco-animate">
					<span class="subheading">Vật tư</span>
					<h2 class="mb-4">Có thể bạn Quan tâm</h2>
				
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			@foreach ($listvt as $item)
				<div class="col-md-6 col-lg-3 ftco-animate">
					<div class="product">
						<a href="{{url('chi_tiet_vat_tu/')}}/{{$item->MaVT}}" class="img-prod"><img class="img-fluid"  style="height: 200px" src="{{ URL::asset('resources/css_js_user/') }}/images/{{$item->Anh}}"
								alt="Colorlib Template">
							
							<div class="overlay"></div>
						</a>
						<div class="text py-3 pb-4 px-3 text-center">
							<h3><a href="{{url('chi_tiet_vat_tu/')}}/{{$item->MaVT}}">{{$item->TenVT}}</a></h3>
							<div class="d-flex">
								<div class="pricing">
									<p class="price"><span >{{number_format($item->DonGia)}}VNĐ</span>/<span
											class="price-sale">{{$item->DVTinh}}</span></p>
								</div>
							</div>
							<div class="bottom-area d-flex px-3">
								<div class="m-auto d-flex">
									<a href="#"
										class="add-to-cart d-flex justify-content-center align-items-center text-center">
										<span><i class="ion-ios-menu"></i></span>
									</a>
									<a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
										<span><i class="ion-ios-cart"></i></span>
									</a>
									<a href="#" class="heart d-flex justify-content-center align-items-center ">
										<span><i class="ion-ios-heart"></i></span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
                @endforeach
			</div>
		</div>
	</section>
  
 

    @include('layout/user/footer')
  


    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery-migrate-3.0.1.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/popper.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.easing.1.3.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.waypoints.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.stellar.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/owl.carousel.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.magnific-popup.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/aos.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/jquery.animateNumber.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/bootstrap-datepicker.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/scrollax.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/google-map.js"></script>
    <script src="{{ URL::asset('resources/css_js_user/') }}/js/main.js"></script>

</body>

</html>
