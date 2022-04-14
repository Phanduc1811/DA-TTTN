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
                <h1><i class="fa fa-file-text"></i> Đơn đặt hàng</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Đơn đặt hàng</a></li>
            </ul>
        </div>
        <div class="col-md-12">
            <div class="tile">
                <div class="row">
                    <div class="col-lg-12">
                        <h2 style="text-align: center" class="title">Chỉnh sửa đơn hàng</h2>
                        <hr>
                        <br>
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputEmail4">Tên Khách</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Số Điện thoại</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Địa chỉ</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Lưu ý</label>
                                    <input type="text" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Ngày đặt</label>
                                    <input type="date" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Ngày giao</label>
                                    <input type="date" class="form-control">
                                </div>
                            </div>
                            <div class="col-md-12" style="text-align:right;">
                                <a href="{{ url('/don_dat_hang/them_san_phan_don_dat_hang') }}" class="btn btn-primary" type="submit" style="background-color:blueviolet">+ Thêm sản phẩm</a>
                            </div>
                            
                            <br>    
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th >STT</th>
                                        <th >Tên vật tư</th>
                                        <th >Giá bán</th>
                                        <th >Số lượng</th>
                                        <th >VAT</th>
                                        <th >Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2</td>
                                        <td>3</td>
                                        <td style="width: 200px" > 
                                            <input type="number" name="qty" style="width: 70px" size="4" min="1" step="1" class="c-input-text qty text" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                            <input type="submit" style="width: auto;height: 33px;padding: 0px 6px;" name="update_qty" class="btn btn-default" value="Cập nhật">
                                        </td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>
                                            <a href=""><i class="fa fa-trash" style=" font-size : 30px"></i></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>2</td>
                                        <td>3</td>
                                        <td style="width: 150px" > 
                                            <input type="number" name="qty" style="width: 70px" size="4" min="1" step="1" class="c-input-text qty text" oninput="this.value =!!this.value && Math.abs(this.value) >= 0 ? Math.abs(this.value) : null">
                                            <input type="submit" style="width: auto;height: 33px;padding: 0px 6px;" name="update_qty" class="btn btn-default" value="Cập nhật">
                                        </td>
                                        <td>5</td>
                                        <td>6</td>
                                        <td>
                                            <a href=""><i class="fa fa-trash" style=" font-size : 30px"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                        <button type="submit" class="btn btn-primary">Cập nhật đơn</button>
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
