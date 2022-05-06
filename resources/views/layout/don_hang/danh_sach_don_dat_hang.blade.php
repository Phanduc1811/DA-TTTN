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
                  <th>Action</th>
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
                  <td>
                    @if($ddh->TrangThai === 0)
                      Chờ xác nhận
                    @elseif($ddh->TrangThai === 1)
                      Đang chuẩn bị
                    @else
                      Đang giao
                    @endif
                  </td>
                  <td>{{$ddh->SoLuong}}</td>
                  <td>
                    <a href="{{ url('/don_dat_hang/chi_tiet_don_dat_hang/'.$ddh->MaDDH) }}"><i class="fa fa-list" style=" font-size : 30px"></i></a>&ensp;&ensp;
                    <a href="#my-modal_{{$ddh->MaDDH}}" data-toggle="modal" role="button"><i class="fa fa-trash" style=" font-size : 30px"></i></a>&ensp;&ensp;
                    <a href="{{ url('/don_dat_hang/sua_don_dat_hang/'.$ddh->MaDDH)}}"><i class=" fa fa-wrench" style=" font-size : 30px"></i></a>
                    <!-- Modal  -->
                    <div id="my-modal_{{$ddh->MaDDH}}" class="modal fade" tabindex="-1"
                                        role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content border-0">
                                                <div class="modal-body p-0">
                                                    <div class="card border-0 p-sm-3 p-2 justify-content-center">
                                                        <div class="card-header pb-0 bg-white border-0 ">

                                                        <div class="row">
                                                                <h4 style="padding:10px 10px 10px 12px">Xác nhận xóa
                                                                </h4>
                                                                <div class="col ml-auto"><button type="button"
                                                                        class="close btnClose" data-dismiss="modal"
                                                                        aria-label="Close"> <span
                                                                            aria-hidden="true">&times;</span> </button>
                                                                </div>

                                                                <hr>
                                                            </div>
                                                            <p class="font-weight-bold mb-2" style="margin-bottom:20px">
                                                                Bạn có muốn xóa không ?</p>

                                                        </div>
                                                        <div class="card-body px-sm-4 mb-2 pt-1 pb-0">
                                                            <div class="row">
                                                                <hr>
                                                            </div>
                                                            <div class="row justify-content-end no-gutters">
                                                                <div class="col-auto"
                                                                    style="float:right; margin-right:20px">
                                                                    <button type="button"
                                                                        class="btn btn-light text-muted"
                                                                        data-dismiss="modal">Cancel</button>
                                                                    <button type="button" class="btn btn-danger px-4"><a
                                                                            class="btnDeleteUser"
                                                                            href="{{url('/don_dat_hang/xoa_don_dat_hang/'.$ddh->MaDDH)}}" style="color: #fff">Delete</a></button>
                                                                </div>
                                                                <!-- <div class="col-auto"><button type="button" class="btn btn-danger px-4" data-dismiss="modal">Delete</button></div> -->
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
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