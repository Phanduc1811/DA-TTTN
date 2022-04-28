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
    <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
    <style>
.cart_name_pro a {
    font-size: 20px;
    text-decoration: none;
    color: #000;
}

.cart_name_pro a:hover {

    color: #AA0000;
}

h4.title {
    color: #f95a32;
    margin-bottom: 0.5em;
    font-size: 1.6em;
    line-height: 1.2em;
    background: #F7F7F7;
    padding: 1em;
}

p.noItemCart {
    color: #777;
    font-size: 1.2em;
    line-height: 1.8em;
}

p.noItemCart a {
    text-decoration: underline;
    color: #f95a32;
}
</style>
</head>

<body class="goto-here">
@include('sweetalert::alert')
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

    <div class="container">
 

        <div class="row">
            <div class="col-sm-12 col-md-10 col-md-offset-1">
            @if(Cart::count() == 0)

            <div class="container" style="margin-top: 100px">
                <div class="check-out">
                    <h4 class="title">Giỏ hàng chưa có sản phẩm</h4>
                    <p class="noItemCart">Bạn chưa có sản phẩm nào trong giỏ hàng.<br>Click<a
                            href="{{URL::to('/trang-chu.html')}}"> vào đây</a> để mua sắm</p>
                </div>

            </div>
            @else
                <form action="{{URL::to('/update-cart')}}" method='post'>
                    {!! csrf_field() !!}
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th class="text-center">Giá</th>
                                <th class="text-center">Tổng</th>

                                <th> </th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($contentCart as $key => $cart_pro)
                            <tr>
                                <td class="col-sm-8 col-md-8">
                                    <div class="media">
                                        <a class="thumbnail pull-left" href="#"> <img class="media-object"
                                                src="{{ URL::asset('resources/css_js_user/') }}/images/{{$cart_pro->options->image}}"
                                                style="height: 100px;"></a>
                                        <div class="media-body">
                                            <h4 class="media-heading cart_name_pro"><a href="">{{$cart_pro->name}}</a>
                                            </h4>
                                            <h5 class="media-heading"> NSX: <a
                                                    href="#">{{$cart_pro->options->brand}}</a></h5>
                                           
                                        </div>
                                    </div>
                                </td>
                                <td class="cart_quantity col-sm-1 col-md-1">
                                    <input type="number" name="quanlity[{{$cart_pro->rowId}}]"
                                        class="form-control quantity" min="1" max="100" value="{{$cart_pro->qty}}">
                                </td>
                                <td class="col-sm-1 col-md-1 text-center price"><strong>{{number_format($cart_pro->price)}}đ</strong></td>
                                <td class="col-sm-1 col-md-1 text-center total_price"><strong style="color: #000;">
                                    @php
                                        $sum = $cart_pro->price * $cart_pro->qty;
                                        echo number_format($sum);
                                    @endphp
                                    đ
                                    </strong></td>
                                <td class="col-sm-1 col-md-1">
                                    <button type="button"
                                        onclick="location.href='{{URL::to('/delete-item-cart/'.$cart_pro->rowId)}}'"
                                        class="btn btn-danger">
                                        <span class="fa fa-times"></span> Xóa
                                    </button>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                        <tfoot>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td>
                                    <h6>Tổng cộng</h6>
                                </td>
                                <td class="text-right">
                            
                                <h6>{{Cart::subtotal()}}đ</h6>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <!-- <button type="button" onclick="location.href='{{URL::to('/delete-item-cart')}}'"
                                        class="btn btn-danger">
                                        <span class="fa fa-times"></span> Xóa tất cả
                                    </button> -->

                                    <a href="#my-modal" data-toggle="modal" class="btn btn-danger" role="button" style="display: flex; width: 110px;"><i
                                            class="fa fa-trash text" style="color:#ffffff"></i><span class="fa fa-times"></span> Xóa tất cả</a>

                                    <div id="my-modal" class="modal fade" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-body p-0">
                                                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                        <div class="card-header pb-0 bg-white border-0 ">

                                                            <div class="row">
                                                                <div class="col ml-auto"><button type="button"
                                                                        class="close btnClose" data-dismiss="modal"
                                                                        aria-label="Close"> <span
                                                                            aria-hidden="true">&times;</span> </button>
                                                                            <h4 style="padding:10px 10px 10px 12px; float: left;">Chú ý
                                                                </div>
                                                                
                                                                </h4>
                                                                <hr>
                                                            </div>
                                                            <p class="font-weight-bold mb-2" style="font-size:16px">
                                                            Bạn có muốn xoá tất cả sản phẩm ra khỏi giỏ hàng?</p>

                                                        </div>
                                                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                            <div class="row">
                                                                <hr>
                                                            </div>
                                                            <div class="row justify-content-end no-gutters">
                                                                <div class="col-auto"
                                                                    style="float:right; margin-right:20px">
                                                                    <button type="button"
                                                                        class="btn btn-light text-muted"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-danger px-4"><a
                                                                            class="btnDeleteUser" style="color: #fff; text-decoration: none;"
                                                                            href="{{URL::to('/delete-item-cart')}}">Delete</a></button>
                                                                </div>
                                                                <!-- <div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td> </td>
                                <td> </td>
                                <td>
                                    <button type="submit" class="btn btn-default" style="width: 100px;">
                                        <span class="fa fa-shopping-cart" ></span> Cập nhật
                                    </button>
                                </td>
                                <td>
                                    <button type="button" class="btn btn-success" 
                                        onclick="location.href='{{URL::to('/order.html')}}'" style="width: 120px;">
                                        Thanh toán <span class="fa fa-angle-right"></span>

                                    </button>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                </form>
            @endif
         
            </div>
        </div>
    </div>

  
 

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
