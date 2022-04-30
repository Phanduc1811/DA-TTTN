<?php

use App\Http\Controllers\CongNo;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonDatHang;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\AuthController;

use App\Http\Controllers\CartController;

use App\Http\Controllers\HoaDonController;

use App\Http\Controllers\PhieuThuController;
use App\Http\Controllers\VatTuController;
use App\Http\Controllers\VatTuUserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::prefix('/')->group(function () {
    Route::get('/', [VatTuUserController::class, 'index']);
    Route::get('/chi_tiet_vat_tu/{MaVT}', [VatTuUserController::class, 'show']);

    Route::get('/login', [VatTuUserController::class, 'userLogin']);
    Route::post('/handle-login-user', [AuthController::class, 'loginUser']);
    Route::get('/register', [VatTuUserController::class, 'userRegister']);
    Route::get('/logoutUser', [AuthController::class, 'logoutUser']);
    Route::post('/signin-users', [AuthController::class, 'signInUser']);

    Route::get('/cart', [CartController::class, 'index']);
    Route::post('/add-to-cart.php',  [CartController::class, 'addCart']);
    Route::get('/delete-item-cart', [CartController::class, 'DeleteAllCart']);
    Route::post('/update-cart',  [CartController::class, 'updateCart']);
    Route::get('/delete-item-cart/{row_id}', [CartController::class, 'DeleteItemCart']);
    Route::get('/chi_tiet_nha_san_xuat/{MaNSX}', [VatTuUserController::class, 'showNSX']);
});

Route::get('/admin', [AuthController::class, 'index']);
Route::get('/admin/dashboard', [AuthController::class, 'index']);
Route::get('/admin-login.php', [AuthController::class, 'adminLogin']);
Route::post('/login-admin', [AuthController::class, 'loginAdmin']);
Route::get('/logoutAdmin.html', [AuthController::class, 'logoutAdmin']);

// Route::prefix('/danh_muc')->group(function () {
//     Route::get('/xem_danh_muc', [DanhMucController::class,'index']);
//     Route::get('/them_danh_muc', [DanhMucController::class,'create']);
//     Route::get('/chi_tiet_danh_muc', [DanhMucController::class,'detail']);
//     Route::get('/sua_danh_muc', [DanhMucController::class,'fix']);
// });
Route::prefix('/vat_tu')->group(function () {
    Route::get('/xem_vat_tu', [VatTuController::class, 'index']);
    Route::get('/them_vat_tu', [VatTuController::class, 'create']);
    Route::post('/them_vat_tu', [VatTuController::class, 'store']);
    Route::get('/sua_vat_tu/{MaVT}', [VatTuController::class, 'edit']);
    Route::put('/sua_vat_tu/{MaVT}', [VatTuController::class, 'update']);
    Route::get('/{MaVT}', [VatTuController::class, 'show']);
    Route::get('/destroy/{MaVT}', [VatTuController::class, 'destroy']);
});
Route::prefix('/nha_san_xuat')->group(function () {
    Route::get('/xem_nha_san_xuat', [NhaSanXuatController::class, 'index']);

    Route::get('/them_nha_san_xuat', [NhaSanXuatController::class, 'create']);
    Route::post('/them_nha_san_xuat', [NhaSanXuatController::class, 'postcreate']);

    Route::get('/chi_tiet_nha_san_xuat/{MaNSX}', [NhaSanXuatController::class, 'show']);

    Route::get('/sua_nha_san_xuat/{MaNSX}', [NhaSanXuatController::class, 'edit']);
    Route::post('/sua_nha_san_xuat/{MaNSX}', [NhaSanXuatController::class, 'postedit']);

    Route::get('/xoa_nha_san_xuat/{MaNSX}', [NhaSanXuatController::class, 'destroy']);
});
Route::prefix('/don_dat_hang')->group(function () {
    Route::get('/xem_don_dat_hang', [DonDatHang::class, 'index']);
    Route::get('/them_don_dat_hang', [DonDatHang::class, 'create']);
    Route::post('/lap_don_dat_hang', [DonDatHang::class, 'createDDH']);
    Route::get('/chi_tiet_don_dat_hang/{MaDDH}', [DonDatHang::class, 'detail']);
    Route::get('/sua_don_dat_hang', [DonDatHang::class, 'fix']);
    Route::get('/them_san_phan_don_dat_hang', [DonDatHang::class, 'add']);
});
Route::prefix('/cong_no')->group(function () {
    Route::get('/xem_cong_no', [CongNo::class, 'index']);
    Route::get('/phieu_ghi_cong_no', [CongNo::class, 'create']);
});
Route::prefix('/phieu_thu')->group(function () {
    Route::get('/xem_phieu_thu', [PhieuThuController::class, 'index']);
    Route::get('/danh_sach_phieu_thu/{MaHD}', [PhieuThuController::class, 'listtheoMaHD']);
    Route::get('/chi_tiet_phieu_thu/{MaPT}', [PhieuThuController::class, 'show']);
    Route::get('/them_phieu_thu/{MaHD}', [PhieuThuController::class, 'create']);
    Route::post('/lap_phieu_thu/{MaHD}', [PhieuThuController::class, 'store']);
    Route::get('/sua_phieu_thu/{MaPT}', [PhieuThuController::class, 'edit']);
    Route::put('/sua_phieu_thu/{MaPT}', [PhieuThuController::class, 'update']);
    Route::get('/xoa_phieu_thu/{MaPT}', [PhieuThuController::class, 'destroy']);
});
Route::prefix('/nhan_vien')->group(function () {
    Route::get('/xem_nhan_vien', [NhanVienController::class, 'index']);

    Route::get('/them_nhan_vien', [NhanVienController::class, 'create']);
    Route::post('/them_nhan_vien', [NhanVienController::class, 'postcreate']);

    Route::get('/chi_tiet_nhan_vien/{MaNV}', [NhanVienController::class, 'show']);

    Route::get('/sua_nhan_vien/{MaNV}', [NhanVienController::class, 'edit']);
    Route::post('/sua_nhan_vien/{MaNV}', [NhanVienController::class, 'postedit']);

    Route::get('/xoa_nhan_vien/{MaNV}', [NhanVienController::class, 'destroy']);
});
Route::prefix('/hoa_don')->group(function () {
    Route::get('/xem_hoa_don', [HoaDonController::class, 'index']);
});
Route::prefix('/khach_hang')->group(function () {
    Route::get('/xem_khach_hang', [KhachHangController::class, 'index']);
    Route::get('/them_khach_hang', [KhachHangController::class, 'create']);
    Route::post('/create-customer', [KhachHangController::class, 'handleCreateCustomer']);
    Route::post('/update-customer/{cus_id}', 'KhachHangController@updateCustomer');
    Route::get('/chi_tiet_khach_hang/{cus_id}', [KhachHangController::class, 'detail']);
    Route::get('/sua_khach_hang/{cus_id}', [KhachHangController::class, 'fix']);
    Route::get('/xoa_khach_hang/{cus_id}', [KhachHangController::class, 'deleteCustomer']);
});
