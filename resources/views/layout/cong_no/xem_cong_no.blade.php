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
                <h1><i class="fa fa-university"></i> &ensp; Công nợ</h1>

            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Công nợ</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col-md-6 col-lg-4"></div>
            <div class="col-md-6 col-lg-4">
                <div class="widget-small danger coloured-icon"><i class=" icon fa fa-money  fa-3x"></i>
                    <div class="info">
                        <b style="font-size:20px">Nợ tháng</b>
                        <h6>40.000.000 VND</h6>
                    </div>
                </div>
              </div>
            <div class="col-md-6 col-lg-4"></div>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="tile-body">
                    <div class="table-responsive">
                        <h4>Danh sách các đơn hàng chưa thanh toán</h4>
                        <hr>
                        <table class="table table-hover table-bordered" id="sampleTable">
                            <thead>
                                <tr>
                                    <th>Mã Khách Hàng</th>
                                    <th>Tên Khách Hàng</th>
                                    <th>Số Nợ</th>
                                    
                                  
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>HD01</td>
                                    <td>Trương Ngọc Khánh</td>
                                    <td>20.000.000VND</td>
                                 
                                    
                                </tr>
                            </tbody>
                        </table>
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
