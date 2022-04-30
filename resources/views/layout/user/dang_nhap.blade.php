<!DOCTYPE html>
<html lang="en">

<head>
    <title>Vật tư</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800&display=swap" rel="stylesheet">
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
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>

<body class="goto-here">
    @include('sweetalert::alert')
    <div class="py-1 bg-primary">
        <div class="container">
            <div class="row no-gutters d-flex align-items-start align-items-center px-md-0">
                <div class="col-lg-12 d-block">
                    <div class="row d-flex">
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-phone2"></span></div>
                            <span class="text">0866530401</span>
                        </div>
                        <div class="col-md pr-4 d-flex topper align-items-center">
                            <div class="icon mr-2 d-flex justify-content-center align-items-center"><span class="icon-paper-plane"></span></div>
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
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-7 ftco-animate">
                    <form action="{{URL::to('/handle-login-user')}}" class="billing-form" method="post">
                        {{ csrf_field() }}
                        <h3 class="mb-4 billing-heading">Đăng nhập</h3>
                        <div class="w-100"></div>
                        <div class="col-md-12" style="padding-left: 0px">
                            <div class="form-group">
                                <label for="streetaddress">Username</label>
                                <input type="text" class="form-control" name="userName">
                            </div>
                        </div>
                        <div class="col-md-12" style="padding-left: 0px">
                            <div class="form-group">
                                <label for="streetaddress">Mật khẩu</label>
                                <input type="password" class="form-control" name="password">
                            </div>
                        </div>
                        <button class="col-md-12 btn btn-submit" style="background-color: #82ae46; border-radius: 0; width: 100px; color: #fff">Submit</button>
                    </form><!-- END -->
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