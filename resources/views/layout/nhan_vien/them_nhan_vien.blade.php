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
                <h1><i class="fa fa-users"></i> Nh??n vi??n </h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Nh??n vi??n</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 class="title">Th??m Nh??n vi??n</h2>
                        <hr>
                        <form method="post" enctype="multipart/form-data" action="{{url('/nhan_vien/them_nhan_vien')}}">
                            <div class="form-group">
                                <label for="exampleInputEmail1">M?? nh??n vi??n</label>
                                <input class="form-control" name="ma_nv"  type="text"
                                    aria-describedby="emailHelp" placeholder="nh???p m??">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">T??n Nh??n vi??n</label>
                                <input class="form-control" name="ten_nv" type="text"
                                    aria-describedby="emailHelp" placeholder="nh???p t??n">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ng??y sinh</label>
                                <input class="form-control" name="ngaysinh_nv" type="date"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                            <div class="form-group">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="inlineRadio1"
                                        value="1">
                                    <label class="form-check-label" for="inlineRadio1">Nam</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="gioitinh" id="inlineRadio2"
                                        value="0">
                                    <label class="form-check-label" for="inlineRadio2">N???</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">?????a ch???</label>
                                <input class="form-control" name="diachi_nv"  type="text"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">S??? ??i???n tho???i</label>
                                <input class="form-control" name="sdt_nv" type="text"
                                    aria-describedby="emailHelp" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Ch???c v???</label>
                                <select class="form-control" name="Quyen" id="exampleSelect1">
                                    <option value="0"{{ old('Quyen')=='0' ? 'selected' : '' }} >Qu???n l??</option>
                                    <option value="1" {{ old('Quyen')=='1' ? 'selected' : '' }}>Nh??n vi??n</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email</label>
                                <input class="form-control" name="email" type="email"
                                    aria-describedby="emailHelp" placeholder="Enter Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Username</label>
                                <input class="form-control" name="username" type="text"
                                    aria-describedby="emailHelp" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input class="form-control" name="password" type="text"
                                    aria-describedby="emailHelp" placeholder="Enter Password">
                            </div>
                           
                            <div class="tile-footer">
                                <input class="btn btn-primary" type="submit" value="Th??m" style="background-color: darkblue">&ensp;
                                <a href="{{url('/nhan_vien/danh_sach_nhan_vien')}}" class="btn btn-primary" style="background-color:red">Quay l???i</a>
                            
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
