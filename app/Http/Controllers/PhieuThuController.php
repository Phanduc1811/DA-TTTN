<?php

namespace App\Http\Controllers;

use App\Models\HoaDon;
use App\Models\PhieuThu;
use Exception;
use Illuminate\Http\Request;
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

        $pt->MaPT = $data['mapt'];
        $pt->NgayTT = $data['ngaythu'];
        $pt->SoTienTT = $data['tienthu'];
        $pt->Dot = $data['thutiendot'];
        $pt->TrangThai = $data['trangthai']==true?'1':'2';
        $pt->MaNV = $data['manv'];
        $pt->MaHD = $data['mahd'];
        $pt->CongNo = $data['congno'];
        $pt->save();

        if ($pt) {

            $hd->ThanhTien = $data['congno'];
            $hd->save();
            alert()->success('Lập phiếu thu', 'Lập Thành Công');
        } else {
            alert()->error('Lập phiếu thu', 'Lập thất bại');
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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('layout/phieu_thu/sua_phieu_thu');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
