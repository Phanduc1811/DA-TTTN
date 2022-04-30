<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <!-- Twitter meta-->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:site" content="@pratikborsadiya">
    <meta property="twitter:creator" content="@pratikborsadiya">
    <!-- Open Graph Meta-->
    <meta property="og:type" content="website">
    <meta property="og:site_name" content="Vali Admin">
    <meta property="og:title" content="Vali - Free Bootstrap 4 admin theme">
    <meta property="og:url" content="http://pratikborsadiya.in/blog/vali-admin">
    <meta property="og:image" content="http://pratikborsadiya.in/blog/vali-admin/hero-social.png">
    <meta property="og:description" content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title> Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/css_js_admin/') }}/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="index.html">Admin</a>
        <!-- Sidebar toggle button-->
        <a class="app-sidebar__toggle" href="#" data-toggle="sidebar" aria-label="Hide Sidebar"></a>

        <!-- Navbar Right Menu-->
        @include('layout/Navbar/NavbarRight')

    </header>

    <!-- Sidebar menu-->
    @include('layout/Navbar/SidebarMenu')
    <!--main content-->
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-file-text"></i> Đơn đặt hàng </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Đơn đặt hàng</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 style="text-align: center" class="title">Tạo đơn hàng</h2>
                        <hr>
                        <br>
                        <form method="post" action="{{URL::to('/don_dat_hang/lap_don_dat_hang/')}}">
                            <div class="row" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Mã Đơn Đặt Hàng</span>
                                    </div>
                                    <input type="text" class="form-control" name="ma_ddh">
                                </div>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">Tên Khách Hàng</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01">
                                        <option selected>Choose...</option>
                                        @foreach($dskh as $kh)
                                        <option value="{{$kh->MaKH}}" name="ma_kh">{{$kh->TenKH}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-5" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Ngày Đặt Hàng</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $date->format('d-m-Y')}}" name="ngay_dat" readonly>
                                </div>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Ngày Nhận Hàng</span>
                                    </div>
                                    <input type="text" class="form-control" name="ngay_giao" value="{{ $date->addDay(7)->format('d-m-Y')}}" readonly>
                                </div>
                            </div>
                            <div class="row mt-5" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Địa Chỉ</span>
                                    </div>
                                    <input type="text" class="form-control" name="dia_chi">
                                </div>

                            </div>
                            <br>
                            <div class="row" style="justify-content: center;">
                                <div class="com-sm-12">
                                    <p style="font-weight: bold; font-size: 20pt;">Danh Sách Sản Phẩm</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Mã vật tư</th>
                                        <th>Tên vật tư</th>
                                        <th>Đơn giá</th>
                                        <th>DVTinh</th>
                                        <th>Số lượng tồn</th>
                                    </tr>
                                </thead>
                                @foreach ($dsvt as $vt)
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" value='{{$vt->MaVT}}' name="ma_vt">
                                        </td>
                                        <td>{{$vt->MaVT}}</td>
                                        <td>{{$vt->TenVT}}</td>
                                        <td>{{$vt->DonGia}}</td>
                                        <td>{{$vt->DVTinh}}</td>
                                        <td>{{$vt->SoLuong}}</td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>
                            <span>
                                {{$dsvt->links()}}
                            </span>
                            <div class="row">
                                <input class="btn btn-primary" type="submit" value="Thêm" style="background-color: darkblue">&ensp;
                                <a href="{{url('/don_dat_hang/xem_don_dat_hang/')}}" class="btn btn-primary" style="background-color:red">Quay lại</a>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">

                </div>

            </div>
        </div>

    </main>


    <!-- Essential javascripts for application to work-->
    <script src="{{ URL::asset('resources/css_js_admin/') }}/js/jquery-3.3.1.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_admin/') }}/js/popper.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_admin/') }}/js/bootstrap.min.js"></script>
    <script src="{{ URL::asset('resources/css_js_admin/') }}/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/pace.min.js"></script>
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/jquery.dataTables.min.js">
    </script>
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/chart.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>


</body>

</html>