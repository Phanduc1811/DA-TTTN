<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
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
    <meta property="og:description"
        content="Vali is a responsive and free admin theme built with Bootstrap 4, SASS and PUG.js. It's fully customizable and modular.">
    <title> Admin </title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('resources/css_js_admin/') }}/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body class="app sidebar-mini">
    <!-- Navbar-->
    <header class="app-header"><a class="app-header__logo" href="{{url('/admin')}}">Admin</a>
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
                <h1><i class=" fa fa-credit-card-alt"></i>Phi???u thu</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Phi???u thu</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 style="text-align: center" class="title">Phi???u thu</h2>
                        <div class="col-lg-12">
                            <h6 style="text-align: center">Ng??y thu ti???n:&nbsp;&nbsp;{{$pt->NgayTT->format('d/m/Y')}}</h6>
                        </div>
                        <hr>
                        @foreach ($nv as $item)
                        <h6>T??n Nh??n vi??n:&nbsp;&nbsp;{{$item->TenNV}}</h6>
                        @endforeach
                        <h6>M?? Phi???u:&nbsp;&nbsp;{{$pt->MaPT}}</h6>
                        <h6 style="text-align: right">M?? H??a ????n: &nbsp;{{$pt->MaHD}}</h6>
                        <hr>
                        <div class="tile">
                            <div class="tile-body">
                                <div class="col-lg-12">
                                    @foreach ($kh as $item)
                                    <h5></i>T??n Kh??ch H??ng:&nbsp;&nbsp;{{$item->TenKH}}</h5>     
                                    @endforeach
                                    <h5>Thu ti???n ?????t:&nbsp;&nbsp;{{$pt->Dot}}</h5>
                                    <h5>T???ng s??? ti???n thu: &nbsp;&nbsp;{{number_format($pt->SoTienTT)}}</h5>
                                </div>
                                <div class="col-lg-12">
                                    <h4 style="text-align: right">T???ng ti???n c??n n???:&nbsp;&nbsp;{{number_format($pt->CongNo)}}</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tile-footer">
                            <a href="{{ url('/phieu_thu/sua_phieu_thu') }}/{{$pt->MaPT}}" class="btn btn-primary" type="submit"
                                style="background-color: darkblue">S???a</a>
                            &ensp; <a href="{{url('/phieu_thu/xem_phieu_thu')}}" class="btn btn-primary" type="submit"
                                style="background-color:violet">Quayl???i</a>
                                
                        </div>
                    </div>
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
    <script type="text/javascript"
        src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/chart.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>


</body>

</html>
