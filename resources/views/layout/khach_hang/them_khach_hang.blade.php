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
        <script src="https://unpkg.com/sweetalert2@7.18.0/dist/sweetalert2.all.js"></script>
</head>

<body class="app sidebar-mini">
@include('sweetalert::alert')
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
                <h1><i class="fa fa-users"></i> Kh??ch h??ng </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Kh??ch h??ng</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">Th??m Kh??ch h??ng</h2>
                        <hr>
                        <form action="{{URL::to('/khach_hang/create-customer')}}" method="post">
                        {!! csrf_field() !!}
                            <div class="form-group">
                                <label for="exampleInputEmail1">M?? Kh??ch h??ng</label>
                                <input class="form-control" id="exampleInputEmail1" type="text"
                                    aria-describedby="emailHelp" placeholder="M?? kh??ch h??ng" required name="customer_id">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">T??n Kh??ch h??ng</label>
                                <input class="form-control" id="exampleInputEmail1" type="text"
                                    aria-describedby="emailHelp" placeholder="T??n kh??ch h??ng" required name="customer_name">
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" checked type="radio" name="radGender" id="inlineRadio1"
                                    value="1">
                                <label class="form-check-label"  for="inlineRadio1">Nam</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="radGender" id="inlineRadio2"
                                    value="0">
                                <label class="form-check-label" for="inlineRadio2">N???</label>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">?????a ch???</label>
                                <input class="form-control" id="exampleInputEmail1" type="text"
                                    aria-describedby="emailHelp" required placeholder="?????a ch???" required name="address">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">S??? ??i???n tho???i</label>
                                <input class="form-control" id="exampleInputEmail1" type="number"
                                    aria-describedby="emailHelp" required placeholder="S??? ??i???n tho???i" name="customer_phone">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ghi ch??</label>
                                <textarea class="form-control" required id="exampleTextarea" rows="2" name="customer_note"></textarea>
                              </div>
                           
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"
                                    style="background-color: darkblue">T???o</button> &ensp; 
                                    <button class="btn btn-primary" type="reset" style="background-color: red">X??a</button>
                            </div>
                        </form> 
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
