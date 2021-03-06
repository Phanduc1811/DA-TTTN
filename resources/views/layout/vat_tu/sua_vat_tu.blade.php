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
                        <h2 class="title">C???p nh???t V???t t??</h2>
                        <hr>
                         @foreach ($nsx as $item)
                        <form action="{{ URL('vat_tu/sua_vat_tu')}}/{{$item->MaVT}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            {{method_field('PUT')}}    
                            <div class="form-group">
                                <label for="exampleInputEmail1">T??n v???t t??</label>
                                <input class="form-control" type="text" placeholder="T??n v???t t??" name="ma_vt"
                                    value="{{ $item->MaVT }}" readonly >
                            </div>                        
                                <div class="form-group">
                                    <label for="exampleInputEmail1">T??n v???t t??</label>
                                    <input class="form-control" type="text" placeholder="T??n v???t t??" name="ten_vt"
                                        value="{{ $item->TenVT }}">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputEmail1">????n v??? t??nh</label>
                                    <input class="form-control" type="text" placeholder="??vt" name="dvt"
                                        value="{{ $item->DVTinh }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">????n gi??</label>
                                    <input class="form-control" type="text" placeholder="nh???p s??? l?????ng" name="don_gia"
                                        value="{{ $item->DonGia }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">S??? l?????ng</label>
                                    <input class="form-control" type="text" placeholder="????n gi??" name="so_luong"
                                        value="{{ $item->SoLuong }}">
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <label>Nh?? S???n Xu???t:</label>
                                        <select name="ma_nsx">
                                            @foreach ($nhasanxuat as $item1)
                                                <option value="{{ $item1->MaNSX }}"
                                                    @if ($item1->MaNSX == $item->MaNSX) old('ma_nsx')
                                          selected="selected" @endif>
                                                    {{ $item1->TenNSX }}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <hr>
                                <button class="btn btn-primary" type="submit"
                                    style="background-color: darkblue">T???o</button>
                                &ensp;
                                <button class="btn btn-primary" type="submit" style="background-color: red">X??a</button>
                            @endforeach
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
