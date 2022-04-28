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
        <h1><i class="fa fa-file-text"></i> &ensp; Đơn đặt hàng</h1>
      </div>
      <ul class="app-breadcrumb breadcrumb">
        <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
        <li class="breadcrumb-item"><a href="#">Đơn đặt hàng</a></li>
      </ul>
    </div>
    <div class="col-md-12">
      <div class="tile">
        <div class="tile-body">

          <div class="table-responsive">
            <a href="{{ url('/don_dat_hang/them_don_dat_hang') }}" class="btn btn-primary" type="submit" style="background-color:blueviolet">+ Tạo đơn đặt hàng</a>
            <hr>
            <table class="table table-hover table-bordered" id="sampleTable">
              <thead>
                <tr>
                  <th>Mã Đơn Đặt</th>
                  <th>Mã Khách</th>
                  <th>Mã Nhân Viên</th>
                  <th>Ngày Lập Đơn</th>
                  <th>Ngày Giao</th>
                  <th>Thành Tiền</th>
                  <th>Trạng Thái</th>
                  <th>Số Lượng</th>
                </tr>
              </thead>
              <tbody>
                @foreach($all_ddh as $key =>$ddh)
                <tr>
                  <td>{{$ddh->MaDDH}}</td>
                  <td>{{$ddh->MaKH}}</td>
                  <td>{{$ddh->MaNV}}</td>
                  <td>{{$ddh->NgayLapDDH}}</td>
                  <td>{{$ddh->NgayGiaoHang}}</td>
                  <td>{{$ddh->ThanhTien}}</td>
                  <td></td>
                  <td>{{$ddh->SoLuong}}</td>
                  <td>
                    <a href="{{ url('/don_dat_hang/chi_tiet_don_dat_hang/'.$ddh->MaDDH) }}"><i class="fa fa-list" style=" font-size : 30px"></i></a>&ensp;&ensp;
                    <a href=""><i class="fa fa-trash" style=" font-size : 30px"></i></a>&ensp;&ensp;
                    <a href="{{ url('/don_dat_hang/sua_don_dat_hang') }}"><i class=" fa fa-wrench" style=" font-size : 30px"></i></a>
                  </td>
                </tr>
                @endforeach
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
  <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/dataTables.bootstrap.min.js"></script>
  <!-- Page specific javascripts-->
  <script type="text/javascript" src="{{ URL::asset('resources/css_js_admin/') }}/js/plugins/chart.js"></script>
  <script type="text/javascript">
    $('#sampleTable').DataTable();
  </script>


</body>

</html>