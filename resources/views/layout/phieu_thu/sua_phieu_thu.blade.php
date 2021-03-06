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
                        <form action="{{ URL('phieu_thu/sua_phieu_thu')}}/{{$pt->MaPT}}" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="_token" value="{{csrf_token()}}" />
                            {{method_field('PUT')}}  
                            <h2 style="text-align: center" class="title">S???a Phi???u thu</h2>
                            <div class="col-lg-12">
                                <h6 style="text-align: center">Ng??y thu ti???n:<input name="ngaythu" type="date" required value={{$pt->NgayTT->format('Y-m-d')}}></h6>
                            </div>
                            <hr>
                            <h6>M?? Phi???u:<input name="mapt" type="text" readonly value="{{$pt->MaPT}}"></h6>
                            <h6>M?? Nh??n vi??n:<input  name="manv" type="text" readonly  value="{{$pt->MaNV}}"></h6>
                            <h6 style="text-align: right">M?? H??a ????n:<input type="text" name="mahd" readonly  value="{{$pt->MaHD}}"></h6>
                            <hr>
                            <div class="tile">
                                <div class="tile-body">
                                    <div class="col-lg-12">
                                        <h5>S??? ti???n thu:<input type="text" name="tienthu" id="tienmoi" value="{{$pt->SoTienTT}}" onkeyup="tinhno()"></h5>
                                        <input type="text" id="tiencu"  value="{{$pt->SoTienTT}}" hidden></h5>
                                        <h5 >Thu ti???n ?????t:<input type="text" name="thutiendot" value="{{$pt->Dot}}"></h5>
                                        <h5>C??ng N???:<input type="text" id="congno" name="congno"  value="{{$pt->CongNo}}" readonly></h5>
                                      
                                        <input type="text" id="congno1" value="{{$pt->CongNo}}" hidden></h5>
                                        <input type="text" id="congno2" value="{{$pt->CongNo}}" hidden></h5>
                                        
                                    </div>
                                    </div>

                                    <div class="col-lg-12">
                                        <h6 style="text-align: right">Tr???ng th??i:<input  type="checkbox" id="trangthai"  {{$pt->TrangThai==1? ' checked' : ''}}></h6>
                                    </div>

                                </div>
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary" type="submit"
                              style="background-color: darkblue">S???a</button>
                                &ensp; <a class="btn btn-primary" type="submit"
                                    href="{{url('phieu_thu/xem_phieu_thu')}}" style="background-color:violet">Quayl???i</a>
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
    <script>
 
        let tienmoi = document.getElementById('tienmoi');
        let tiencu = document.getElementById('tiencu'); 
        let congno = document.getElementById('congno1');
        let congno2 = document.getElementById('congno2');
      
        function tinhno() {

            if(parseFloat(tienmoi.value)-parseFloat(congno.value)==0){
                alert('H???t n???!');
                document.getElementById('congno').value = 0;
                document.getElementById('trangthai').checked = true;
            }else
            if(parseFloat(tienmoi.value)>parseFloat(tiencu.value)){
                  let congnomoi=parseFloat(congno1.value)-(parseFloat(tienmoi.value)-parseFloat(tiencu.value));
                  document.getElementById('congno').value = congnomoi;
                  console.log(congno.value);
            }
            else if(parseFloat(tiencu.value)>parseFloat(tienmoi.value)){
                let nomoi=parseFloat(congno2.value)+parseFloat(tiencu.value)-parseFloat(tienmoi.value)
                document.getElementById('congno').value = nomoi;
            }else if(parseFloat(tiencu.value)==parseFloat(tienmoi.value))
            {
                alert('Ki???m tra l???i s??? ti???n nh???p')
                document.getElementById('congno').value = congno2.value;
            }
            
            
        }
    </script>

</body>

</html>
