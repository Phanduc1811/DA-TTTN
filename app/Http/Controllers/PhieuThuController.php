<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\NhanVien;
use App\Models\PhieuThu;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class PhieuThuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pt = PhieuThu::get();
        return view('layout/phieu_thu/danh_sach_phieu_thu', ['pt' => $pt]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($MaHD)
    {
        $hd = HoaDon::find($MaHD);
        return view('layout/phieu_thu/lap_phieu_thu', ['hd' => $hd]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $MaHD)
    {
        $data = $request->all();
        $pt = new PhieuThu();
        $hd = HoaDon::find($MaHD);

        try {
            $pt->MaPT = $data['mapt'];
            $pt->NgayTT = $data['ngaythu'];
            $pt->SoTienTT = $data['tienthu'];
            $pt->Dot = $data['thutiendot'];
            $pt->TrangThai = isset($data['trang_thai']) ? $data['trang_thai'] : 0;
            $pt->MaNV = $data['manv'];
            $pt->MaHD = $data['mahd'];
            $pt->CongNo = $data['congno'];
            $pt->save();
            if ($pt) {
                $hd->ThanhTien = $data['congno'];
                $hd->save();
                alert()->success('Lập phiếu thu', 'Lập Thành Công');
            }
        } catch (Exception $e) {
            $errorCode = $e->errorInfo[1];
            if ($errorCode == 1062) {
                alert()->error('Lập phiếu thu', 'Lập thất bại');
            }
            if ($errorCode == 1048) {
                alert()->error('Lập phiếu thu', 'Lập thất bại');
            }
        }

        return redirect()->back();

        // $data = $request->all();
        // $pt = new PhieuThu();
        // $hd=HoaDon::find($MaHD);
        // $hd->ThanhTien=$data['congno'];
        // $pt->MaPT = $data['mapt'];
        // $pt->NgayTT = $data['ngaythu'];
        // $pt->SoTienTT = $data['tienthu'];
        // $pt->Dot = $data['thutiendot'];
        // $pt->TrangThai = isset($data['trangthai']) ? $data['trang_thai'] : 0;
        // $pt->MaNV = $data['manv'];
        // $pt->MaHD = $data['mahd'];
        // $pt->CongNo = $data['congno'];
        // $hd->save();
        // $result = $pt->save();
        // if ($result)
        //     return redirect('hoa_don/xem_hoa_don')->with('success', 'Thêm thành công');
        // else
        //     return redirect('hoa_don/xem_hoa_don')->with('alert', 'Thêm không thành công');
    }


    public function listtheoMaHD($MaHD)
    {
        $pt = PhieuThu::where('phieuthu.MaHD', '=', $MaHD)->get();
        return view('layout/phieu_thu/danh_sach_phieu_thue_theo_maHD', ['pt' => $pt]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($MaPT)
    {
        $pt = PhieuThu::find($MaPT);
        $nv = DB::table('nhan_vien')->join('phieuthu', 'nhan_vien.MaNV', 'phieuthu.MaNV')->where('phieuthu.MaNV', $pt->MaNV)->limit(1)->get();
        $kh = DB::table('hoadon')->join('khach_hang', 'hoadon.MaKH', 'khach_hang.MaKH')->join('phieuthu', 'hoadon.MaHD', 'phieuthu.MaHD')->where('phieuthu.MaHD', $pt->MaHD)->limit(1)->get();
        return view('layout/phieu_thu/chi_tiet_phieu_thu', ['pt' => $pt, 'nv' => $nv, 'kh' => $kh]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($MaPT)
    {
        $pt = PhieuThu::find($MaPT);
        return view('layout/phieu_thu/sua_phieu_thu', ['pt' => $pt]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaPT)
    {

        $pt = PhieuThu::find($MaPT);


        $data = $request->all();
        $pt->MaPT = $data['mapt'];
        $pt->NgayTT = $data['ngaythu'];
        $pt->SoTienTT = $data['tienthu'];
        $pt->Dot = $data['thutiendot'];
        $pt->TrangThai =  isset($data['trang_thai']) ? $data['trang_thai'] : 0;
        $pt->MaNV = $data['manv'];
        $pt->MaHD = $data['mahd'];
        $pt->CongNo = $data['congno'];
        $pt->save();
        if ($pt) {

            alert()->success('Lập phiếu thu', 'Cập nhật Thành Công');
        } else {
            alert()->error('Lập phiếu thu', 'Cập nhật thất bại');
        }

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaPT)
    {
        $pt = PhieuThu::find($MaPT);
        $pt->delete();
        if ($pt) {

            alert()->success('Xóa phiếu thu', 'Xóa Thành Công');
        } else {
            alert()->error('Lập phiếu thu', 'Xóa thất bại');
        }

        return redirect()->back();
    }
}
