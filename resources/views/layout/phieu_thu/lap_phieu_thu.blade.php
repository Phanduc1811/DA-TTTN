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
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])
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
                        <form action="{{ url('phieu_thu/lap_phieu_thu') }}/{{$hd->MaHD}}" method="POST"
                            enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                            <div class="form-group">
                                <label for="exampleInputEmail1">M?? Phi???u Thu</label>
                                <input class="form-control" type="text" placeholder="M?? phi???u thu" name="mapt">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">M?? Nh??n Vi??n</label>
                                <input class="form-control" type="text" placeholder="M?? nh??n vi??n" name="manv">
                            </div>

                            <div class="form-group">
                                <label for="exampleInputEmail1">Ng??y thu ti???n</label>
                                <input class="form-control" type="date" placeholder="ng??y thu ti???n" name="ngaythu">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">S??? ti???n thu</label>
                                <input class="form-control" type="text" id="sotienthu" placeholder="s??? ti???n thu ???????c"
                                    name="tienthu" onkeyup="tinhno()">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">?????t thu ti???n</label>
                                <input class="form-control" type="text" placeholder="s??? ti???n thu ??c"
                                    name="thutiendot">
                            </div>
                            <div class="form-group">

                                <input class="form-control" type="text" id="tongtien" hidden
                                    value="{{ $hd->ThanhTien }}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">M?? H??a ????n</label>
                                <input class="form-control" type="text" placeholder="M?? h??a ????n"
                                  id="mahd"  value="{{ $hd->MaHD }}" name="mahd">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">C??ng n???</label>
                                <input class="form-control" name="congno" id="congno" type="text" readonly value="">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">C??n N??? Hay Kh??ng</label>
                                <input class="form-control" id="trangthai" name="trang_thai" type="checkbox">
                            </div>
                            <hr>
                            <div style="text-align: center" id="taophieu">
                                <button class="btn btn-primary" type="submit"
                                    style="background-color: darkblue">T???o</button>
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
    <script type="text/javascript">
        $('#sampleTable').DataTable();
    </script>
    <script>
        let hd=document.getElementById('mahd').value;
        console.log('mahd');
        let tienthu = document.getElementById('sotienthu');
        console.log(tienthu.value);
        let = tongtien = document.getElementById('tongtien')
        if (tongtien.value == 0) {
                window.location = `http://localhost/DA-TTTN/phieu_thu/danh_sach_phieu_thu/${hd}`;
                  alert(`???? h???t n??? ! Danh s??ch phi???u thu c???a H??a ????n ${hd}`)
        } 

        function tinhno() {
           if (tongtien.value < tienthu.value) {
                alert('Nh???p ti???n thu Sai');
            }
            let congno = parseFloat(tongtien.value) - parseFloat(tienthu.value);
            if (congno == 0) {
                alert('???? h???t n???');
                document.getElementById('trangthai').checked = true;
            }

            console.log(congno);
            document.getElementById('congno').value = congno;
        }
    </script>

</body>

</html>
