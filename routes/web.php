<?php

use App\Http\Controllers\CongNo;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\DonDatHang;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\NhanVienController;
use App\Http\Controllers\NhaSanXuatController;
use App\Http\Controllers\PhieuThu;
use App\Http\Controllers\VatTuController;
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

Route::get('/', function () {
    return view('master');

});
Route::prefix('/danh_muc')->group(function () {
    Route::get('/xem_danh_muc', [DanhMucController::class,'index']);
    Route::get('/them_danh_muc', [DanhMucController::class,'create']);
    Route::get('/chi_tiet_danh_muc', [DanhMucController::class,'detail']);
    Route::get('/sua_danh_muc', [DanhMucController::class,'fix']);
});
Route::prefix('/vat_tu')->group(function () {
    Route::get('/xem_vat_tu', [VatTuController::class,'index']);
    Route::get('/them_vat_tu', [VatTuController::class,'create']);
    Route::post('/them_vat_tu', [VatTuController::class,'store']);
    Route::get('/sua_vat_tu/{MaVT}', [VatTuController::class,'edit']);
    Route::put('/sua_vat_tu/{MaVT}', [VatTuController::class,'update']);
    Route::get('/{MaVT}', [VatTuController::class,'show']);
    Route::get('/destroy/{MaVT}', [VatTuController::class,'destroy']);
    
});
Route::prefix('/nha_san_xuat')->group(function () {
    Route::get('/xem_nha_san_xuat', [NhaSanXuatController::class,'index']);
    Route::get('/them_nha_san_xuat', [NhaSanXuatController::class,'create']);
    Route::get('/chi_tiet_nha_san_xuat', [NhaSanXuatController::class,'detail']);
    Route::get('/sua_nha_san_xuat', [NhaSanXuatController::class,'fix']);
});
Route::prefix('/don_dat_hang')->group(function () {
    Route::get('/xem_don_dat_hang', [DonDatHang::class,'index']);
    Route::get('/them_don_dat_hang', [DonDatHang::class,'create']);
    Route::get('/chi_tiet_don_dat_hang', [DonDatHang::class,'detail']);
    Route::get('/sua_don_dat_hang', [DonDatHang::class,'fix']);
});
Route::prefix('/cong_no')->group(function () {
    Route::get('/xem_cong_no', [CongNo::class,'index']);
    Route::get('/phieu_ghi_cong_no', [CongNo::class,'create']);
});
Route::prefix('/phieu_thu')->group(function () {
    Route::get('/xem_phieu_thu', [PhieuThu::class,'index']);
    Route::get('/lap_phieu_thu', [PhieuThu::class,'create']);
    Route::get('/chi_tiet_phieu_thu', [PhieuThu::class,'detail']);
});
Route::prefix('/nhan_vien')->group(function () {
    Route::get('/xem_nhan_vien', [NhanVienController::class,'index']);
    Route::get('/them_nhan_vien', [NhanVienController::class,'create']);
    Route::get('/chi_tiet_nhan_vien', [NhanVienController::class,'detail']);
    Route::get('/sua_nhan_vien', [NhanVienController::class,'fix']);
});
Route::prefix('/khach_hang')->group(function () {
    Route::get('/xem_khach_hang', [KhachHangController::class,'index']);
    Route::get('/them_khach_hang', [KhachHangController::class,'create']);
    Route::get('/chi_tiet_khach_hang', [KhachHangController::class,'detail']);
    Route::get('/sua_khach_hang', [KhachHangController::class,'fix']);
});