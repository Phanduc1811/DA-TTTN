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

    <div class="hero-wrap hero-bread" style="background-image: url('resources/css_js_user/images/slide.jpg');">
        <div class="container">
            <div class="row no-gutters slider-text align-items-center justify-content-center">
                <div class="col-md-9 ftco-animate text-center">
                    <p class="breadcrumbs"><span class="mr-2"><a href="index.html">Home</a></span>
                        <span>Checkout</span></p>
                    <h1 class="mb-0 bread">Checkout</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="#" class="billing-form">
                        <h3 class="mb-4 billing-heading">Chi tiết thanh toán</h3>
                        <div class="row align-items-end">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="firstname">Họ tên </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="firstname">Email </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="firstname">Số điện thoại </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="firstname">Địa chỉ </label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                            <div class="w-100"></div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="phone">Ghi chú</label>
                                    <input type="text" class="form-control" placeholder="">
                                </div>
                            </div>
                        </div>
                    </form><!-- END -->
                </div>
                <div class="col-xl-5">
                    <div class="row mt-5 pt-3">
                        <div class="col-md-12 d-flex mb-5">
                            <div class="cart-detail cart-total p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Tổng tiển giỏ hàng</h3>
                                <p class="d-flex">
                                    <span>Tổng </span>
                                    <span>$20.60</span>
                                </p>
                                <p class="d-flex">
                                    <span>Phí vận chuyển</span>
                                    <span>$0.00</span>
                                </p>
                                <p class="d-flex">
                                    <span>Discount</span>
                                    <span>$3.00</span>
                                </p>
                                <hr>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="cart-detail p-3 p-md-4">
                                <h3 class="billing-heading mb-4">Payment Method</h3>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> COD</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2"> Check
                                                Payment</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="radio">
                                            <label><input type="radio" name="optradio" class="mr-2">
                                                Paypal</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12">
                                        <div class="checkbox">
                                            <label><input type="checkbox" value="" class="mr-2"> I have read
                                                and accept the terms and conditions</label>
                                        </div>
                                    </div>
                                </div>
                                <p><a href="{{ url('/checkout/success') }}" class="btn btn-primary py-3 px-4">Đặt hàng</a></p>
                            </div>
                        </div>
                    </div>
                </div> <!-- .col-md-8 -->
            </div>
        </div>
    </section> <!-- .section -->


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
