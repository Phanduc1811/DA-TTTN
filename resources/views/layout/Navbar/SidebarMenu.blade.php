<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
@if(Auth::guard('admin')->check())
            @php
                $users_name = Auth::guard('admin')->user()->Username;
                $user_roles = Auth::guard('admin')->user()->Quyen;
        @endphp
<aside class="app-sidebar">
    <div class="app-sidebar__user"><img class="app-sidebar__user-avatar"
            src="{{ URL::asset('resources/css_js_admin/') }}/images/img_avatar.png" style="width: 100px" alt="User Image">
        <div>
            <p class="app-sidebar__user-name">@php echo $users_name @endphp</p>
            <p class="app-sidebar__user-designation">
                @php 
                if($user_roles == 0) 
                    echo 'Nhân viên';
                else if($user_roles == 1)
                    echo 'Trưởng phòng';
                @endphp
            </p>
        </div>
    </div>
    <ul class="app-menu">
        <li><a class="app-menu__item active" href="{{ url('/') }}"><i
                    class="app-menu__icon fa fa-dashboard"></i><span class="app-menu__label">Dashboard</span></a></li>

        <li><a class="app-menu__item active" href="{{ url('/danh_muc/xem_danh_muc') }}"><i
                    class="app-menu__icon fa fa-bars"></i><span class="app-menu__label">Danh mục</span></a></li>

        <li><a class="app-menu__item active" href="{{ url('/vat_tu/xem_vat_tu') }}"><i
                    class="app-menu__icon fa fa-archive"></i><span class="app-menu__label">Vật tư</span></a></li>

        <li><a class="app-menu__item active" href="{{ url('/nha_san_xuat/xem_nha_san_xuat') }}"><i
                    class="app-menu__icon fa fa-building-o"></i><span class="app-menu__label">Nhà sản xuất</span></a>
        </li>
        <hr>
        <li><a class="app-menu__item active" href="{{ url('/phieu_thu/xem_phieu_thu') }}"><i fa fa-university
                    class="app-menu__icon fa fa-credit-card-alt"></i><span class="app-menu__label">Phiếu thu</span></a>
        </li>

        <li><a class="app-menu__item active" href="{{ url('/cong_no/xem_cong_no') }}"><i
                    class="app-menu__icon fa fa-university"></i><span class="app-menu__label">Công nợ</span></a>
        </li>

        <li><a class="app-menu__item active" href="{{ url('/don_dat_hang/xem_don_dat_hang') }}"><i
                    class="app-menu__icon fa fa-file-text"></i><span class="app-menu__label">Đơn đặt hàng</span></a>
        </li>

        <li class="treeview"><a class="app-menu__item" href="#" data-toggle="treeview"><i
                    class="app-menu__icon fa fa-users"></i><span class="app-menu__label">Contact</span><i
                    class="treeview-indicator fa fa-angle-right"></i></a>
            <ul class="treeview-menu">
                <li><a class="treeview-item" href="{{ url('/nhan_vien/xem_nhan_vien') }}"><i class="icon fa fa-user"></i>Nhân viên </a></li>
                <li><a class="treeview-item" href="{{ url('/khach_hang/xem_khach_hang') }}"><i class="icon fa fa-users"></i>Khách Hàng</a></li>

            </ul>
        </li>
    </ul>
</aside>
@endif
