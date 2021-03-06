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
                <h1><i class="fa fa-file-text"></i> ????n ?????t h??ng</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">????n ?????t h??ng</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 style="text-align: center" class="title">Ch???nh s???a ????n h??ng</h2>
                        <hr>
                        <br>
                        <form method="post" action="{{URL::to('/don_dat_hang/cap_nhat_don/'.$ddh[0]->MaDDH)}}"  >
                        {{ csrf_field() }}
                        <div class="row" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">M?? ????n ?????t H??ng</span>
                                    </div>
                                    <input type="text" class="form-control" disabled name="ma_ddh" value="{{$ddh[0]->MaDDH}}">
                                </div>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <label class="input-group-text" for="inputGroupSelect01">T??n Kh??ch H??ng</label>
                                    </div>
                                    <select class="custom-select" id="inputGroupSelect01" name="ma_kh">
                                        <option selected>Choose...</option>
                                        @foreach($dskh as $kh)
                                        <option value="{{$kh->MaKH}}" @php if($kh->MaKH == $ddh[0]->MaKH) echo 'selected' @endphp >{{$kh->TenKH}}</option>
                                        @endforeach
                                    </select>
                                </div>

                            </div>
                            <div class="row mt-5" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Ng??y ?????t H??ng</span>
                                    </div>
                                    <input type="text" class="form-control" value="{{ $date->format('d-m-Y')}}" name="ngay_dat" readonly>
                                </div>
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">Ng??y Nh???n H??ng</span>
                                    </div>
                                    <input type="text" class="form-control" name="ngay_giao" value="{{ $date->addDay(7)->format('d-m-Y')}}" readonly>
                                </div>
                            </div>
                            <div class="row mt-5" style="justify-content: center;">
                                <div class="input-group col-sm-6">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="">?????a Ch???</span>
                                    </div>
                                    <input type="text" class="form-control" name="dia_chi" value="{{$ddh[0]->DiaChi}}">
                                </div>

                            </div>
                            <div class="col-md-12" style="text-align:right;">
                                <a href="{{ url('/don_dat_hang/them_san_phan_don_dat_hang') }}" class="btn btn-primary" type="submit" style="background-color:blueviolet">+ Th??m s???n ph???m</a>
                            </div>
                            
                            <br>    
                            <div class="row" style="justify-content: center;">
                                <div class="com-sm-12">
                                    <p style="font-weight: bold; font-size: 20pt;">Danh S??ch S???n Ph???m</p>
                                </div>
                            </div>
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                   
                                        <th>M?? v???t t??</th>
                                        <th>T??n v???t t??</th>
                                        <th>????n gi??</th>
                                        <th>DVTinh</th>
                                        <th>S??? l?????ng t???n</th>
                                    </tr>
                                </thead>
                                @foreach ($dsvt as $vt)
                                <tbody>
                                    <tr>
                                
                                        <td>{{$vt->MaVT}}</td>
                                        <td>{{$vt->TenVT}}</td>
                                        <td>{{$vt->DonGia}}</td>
                                        <td>{{$vt->DVTinh}}</td>
                                        <td>{{$vt->SoLuong}}</td>
                                    </tr>
                                </tbody>
                                @endforeach

                            </table>

                            <div class="row" style="justify-content: center;">
                                <div class="com-sm-12">
                                    <p style="font-weight: bold; font-size: 20pt;">T???t c??? s???n Ph???m</p>
                                </div>
                            </div>
                            <table class="table table-bordered" id="table_vattu_update">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>M?? v???t t??</th>
                                        <th>T??n v???t t??</th>
                                        <th>????n gi??</th>
                                        <th>DVTinh</th>
                                        <th>S??? l?????ng t???n</th>
                                    </tr>
                                </thead>
                                @foreach ($data_vt as $vt)
                                <tbody>
                                    <tr>
                                        <td scope="row">
                                            <input type="checkbox" value='{{$vt->MaVT}}' id="chk" name="check[]">
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
                            <input class="btn btn-primary" type="submit" value="C???p nh???t ????n" style="background-color: darkblue">&ensp;
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

    <script type="text/javascript">
        function GetSelected() {

        
            //Reference the Table.
            var grid = document.getElementById("table_vattu_update");
    
            //Reference the CheckBoxes in Table.
            var checkBoxes = grid.getElementsByTagName("INPUT");
            var chk_id = [];
    
            //Loop through the CheckBoxes.
            for (var i = 0; i < checkBoxes.length; i++) {
                if (checkBoxes[i].checked) {
                    var row = checkBoxes[i].parentNode.parentNode;
        
                    chk_id.push(row.cells[1].innerHTML);
                    // message += "   " + row.cells[2].innerHTML;
                    // message += "   " + row.cells[3].innerHTML;
                
                }
            }
    
            //Display selected Row data in Alert Box.
            console.log(chk_id);
        
            var _token = $('meta[name="csrf-token"]').attr('content');


            $.ajax({
                url: "{{url('/set-chkSession')}}",
                method: 'POST',
                data: {
                    chk_id_update: chk_id,
                    _token: _token
                }

            });
        }
    </script>


</body>

</html>
