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
    <header class="app-header"><a class="app-header__logo" href="{{ url('/admin') }}">Admin</a>
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
                <h1><i class="fa fa-archive"></i> V???t t??</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">V???t t??</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">Th??ng tin</h2>
                        <hr>
                        <div class="tile">
                            <div class="tile-body">
                                <div class="table-responsive">
                                    <a href="{{ url('/vat_tu/them_vat_tu') }}" class="btn btn-primary" type="submit" style="background-color:blueviolet">+ Th??m v???t t??</a>
                                    <hr>
                                    <table class="table table-hover table-bordered" id="sampleTable">
                                        <tr>
                                            <th>#</th>
                                            <td>Th??ng tin</td>
                                        </tr>
                                        <tr>
                                            <th>ID</th>
                                            <td>{{ $vt->MaVT }}</td>

                                        </tr>
                                        <tr>
                                            <th>T??n V???t T??</th>
                                            <td>{{ $vt->TenVT }}</td>

                                        </tr>
                                        <tr>
                                            <th>????n v??? t??nh</th>
                                            <td>{{ $vt->DVTinh }}</td>

                                        </tr>
                                        <tr>
                                            <th>S??? l?????ng</th>
                                            <td>{{ $vt->SoLuong }}</td>

                                        </tr>
                                        @foreach ($nsx as $item1)


                                        <tr>
                                            <th>Nh?? S???n Xu???t</th>
                                            <td>{{$item1->TenNSX}}</td>
                                        </tr>
                                        <tr>
                                            <th>?????a ch???</th>
                                            <td>{{$item1->DiaChi}}</td>
                                        </tr>

                                        @endforeach
                                    </table>
                                </div>
                                <div class="tile-footer">
                                    <a href=" {{ url('/vat_tu/sua_vat_tu')}}/{{$vt->MaVT}}" class="btn btn-primary" type="submit" style="background-color:rgb(20, 97, 116)">S???a
                                        l???i</a>
                                    &ensp; <a href="{{url('/vat_tu/xem_vat_tu')}}" class="btn btn-primary" type="submit" style="background-color:violet">Quay
                                        l???i</a>
                                </div>
                            </div>
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
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/dataTables.bootstrap.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/chart.js"></script>
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>


</body>

</html>