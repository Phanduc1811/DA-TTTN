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
.section .section-content .content-box {
    box-shadow: 0 0 0 1px #d9d9d9;
    border-radius: 4px;
    background: #fff;
    color: #737373;
    margin-top: 1em;
}

.radio-wrapper .radio-input,
.checkbox-wrapper .checkbox-input {
    display: table-cell;
    padding-right: 0.75em;
    white-space: nowrap;
}

.radio-wrapper .two-page,
.checkbox-wrapper .checkbox-label {
    display: flex;
    cursor: pointer;
    align-items: center;
    padding: 1.3em;
    width: auto;
}

.radio-wrapper .radio-content-input {
    display: flex;
    align-items: center;
}

.blank-slate {
    white-space: pre-line;
    padding: 1.5em;
    text-align: center;
}

.sidebar .sidebar-content .order-summary .product .product-image .product-thumbnail .product-thumbnail-quantity {
    font-size: 0.85714em;
    font-weight: 500;
    white-space: nowrap;
    padding: 0.15em 0.65em;
    border-radius: 2em;
    background-color: rgba(153, 153, 153, 0.9);
    color: #fff;
    position: absolute;
    right: -0.75em;
    top: -0.75em;
    z-index: 2;
}

.visually-hidden {
    border: 0;
    clip: rect(0, 0, 0, 0);
    clip: rect(0 0 0 0);
    width: 2px;
    height: 2px;
    margin: -2px;
    overflow: hidden;
    padding: 0;
    position: absolute;
}
.order{
    margin-top:20px;
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


    <div class="container" style="margin-top: 50px">
        <div class="row">

            <div class="col-md-7 order-md-1">
                <h4 class="mb-3">Thông tin giao hàng</h4>
                <form class="needs-validation" action="{{URL::to('/handle-order')}}" method="post">
                    {!! csrf_field() !!}
                    <input type="hidden" name="total_price" value="{{Cart::subtotal()}}">
                    <input type="hidden" name="users_id" value="@php echo Auth::guard('user')->user()->MaKH; @endphp">
                    @foreach($info_user as $key =>$user)

                    <div class="row order">
                        <div class="col-md-12 mb-6">
                            <label for="firstName">Họ tên</label>
                            <input type="text" class="form-control" value="{{$user->TenKH}}" name="order_cusName"
                                required readonly>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="firstName">Email</label>
                            <input type="email" class="form-control" value="{{$user->Email}}" name="order_cusEmail"
                                required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="lastName">Số điện thoại</label>
                            <input type="text" class="form-control" placeholder="" name="order_cusPhone"
                                value="{{$sdt_user->SDT}}" required disabled>
                        </div>
                    </div>

                    <div class="mb-3 order">
                        <label for="address">Địa chỉ nhận hàng</label>
                        <input type="text" class="form-control" placeholder="1234 Main St"
                            value="{{$user->DiaChi}}" name="order_cusAddress" required>
                    </div>
                    @endforeach


                    <div class="step">
                        <div class="step-sections " step="2">
                            <div id="section-shipping-rate" class="section">
                                <div class="section-header order">
                                    <h4 class="mb-3">Phương thức vận chuyển</h4>
                                </div>
                                <div class="section-content">

                                    <div class="content-box">

                                        <div class="content-box-row">
                                            <div class="radio-wrapper"
                                                style="position: relative;padding-top: 10px;vertical-align: middle;padding-left: 10px;">
                                                <label class="radio-label" for="shipping_rate_id_721627">
                                                    <div class="radio-input">
                                                        <input id="shipping_rate_id_721627" class="input-radio"
                                                            type="radio" name="shipping_rate_id" value="721627"
                                                            checked="">
                                                    </div>
                                                    <span class="radio-label-primary" style="display:table-cell">Giao
                                                        hàng tận nơi</span>
                                                    <span class="radio-accessory content-box-emphasis"
                                                        style="float: right;position: absolute;right: 2%;top: 20%;">
                                                        0₫
                                                    </span>
                                                </label>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                            </div>

                            <div id="section-payment-method" class="section">
                                <div class="section-header order">
                                    <h4 class="mb-3">Phương thức thanh toán</h4>
                                </div>
                                <div class="section-content">
                                    <div class="content-box">


                                        <div class="radio-wrapper content-box-row">
                                            <label class="two-page" for="payment_method_id_54606">
                                                <div class="radio-input payment-method-checkbox">
                                                    <input type-id="1" id="payment_method_id_54606" class="input-radio"
                                                        name="payment_method_id" type="radio" value="54606" checked="">
                                                </div>

                                                <div class="radio-content-input">
                                                    <img class="main-img"
                                                        src="https://hstatic.net/0/0/global/design/seller/image/payment/cod.svg?v=1">
                                                    <div class="content-wrapper">
                                                        <span class="radio-label-primary"
                                                            style="margin-left: 10px;">Thanh toán khi giao hàng
                                                            (COD)</span>
                                                        <span class="quick-tagline hidden"></span>
                                                        <span class="quick-tagline  hidden ">Buy Now, Pay Later

                                                        </span>
                                                    </div>
                                                </div>
                                            </label>
                                        </div>

                                        <div class="radio-wrapper content-box-row content-box-row-secondary "
                                            for="payment_method_id_54606">
                                            <div class="blank-slate" style="background-color: #fafafa;">
                                                Là phương thức khách hàng nhận hàng mới trả tiền. Áp dụng với tất cả các
                                                đơn hàng trên toàn quốc
                                            </div>
                                        </div>




                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                    <hr class="mb-4">
                    <button class="btn btn-primary btn-lg btn-block" type="submit">Đặt hàng</button>
                </form>
            </div>
            <div class="col-md-5 order-md-2 mb-4">
                <h4 class="d-flex justify-content-between align-items-center mb-3">
                    <span class="text-muted">Giỏ hàng</span>
                    <span class="badge badge-secondary badge-pill">{{Cart::content()->count()}}</span>
                </h4>
                <ul class="list-group mb-3">
                @foreach($cart_content as $key => $cart_pro)
                    <li class="list-group-item d-flex justify-content-between lh-condensed">
                        <table class="product-table" style="width:100%">
                            <thead>
                                <tr>
                                    <th scope="col"><span class="visually-hidden">Hình ảnh</span></th>
                                    <th scope="col"><span class="visually-hidden">Mô tả</span></th>
                                    <th scope="col"><span class="visually-hidden">Số lượng</span></th>
                                    <th scope="col"><span class="visually-hidden">Giá</span></th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr class="product" data-product-id="1016621180" data-variant-id="1031708031">
                                    <td class="product-image" rowspan=2 style="width: 100px;">
                                        <div class="product-thumbnail">
                                            <div class="product-thumbnail-wrapper">
                                                <img class="product-thumbnail-image" alt=""
                                                    style="height: 100px;"
                                                    src="{{ URL::asset('resources/css_js_user/') }}/images/{{$cart_pro->options->image}}"
                                            </div>

                                        </div>
                                    </td>
                                    <td class="product-description" colspan=2>
                                        <span class="product-description-name order-summary-emphasis"
                                            style="font-size:16px">{{$cart_pro->name}}</span>

                                    </td>


                                </tr>
                                <tr>
                                    <td class="product-quantity"><span style="font-size:13px">SL:
                                    {{$cart_pro->qty}}</span> </td>
                                    <td class="product-price">
                                        <span class="order-summary-emphasis" style="float:right">@php echo
                                            number_format($cart_pro->price) @endphp đ</span>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </li>
                    @endforeach



                    <li class="list-group-item d-flex justify-content-between">
                        <span>Tổng cộng: </span>
                        <strong>{{ Cart::subtotal()}} đ</strong>
                       
                    </li>
                </ul>

                <!-- <form class="card p-2">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Promo code">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-secondary">Redeem</button>
                        </div>
                    </div>
                </form> -->
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
