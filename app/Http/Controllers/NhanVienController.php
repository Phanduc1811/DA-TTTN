<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhanVien;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\DB;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DsNV = NhanVien::join('sdt_nv', 'sdt_nv.MaNV', '=', 'nhan_vien.MaNV')
            ->select("nhan_vien.*", "sdt_nv.SDT")->get();
        return view('layout/nhan_vien/danh_sach_nhan_vien', ['DsNV' => $DsNV]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout/nhan_vien/them_nhan_vien');
    }

    public function postCreate(Request $request)
    {
        $nv = new NhanVien;
        $nv->MaNV = $request->ma_nv;
        $nv->TenNV = $request->ten_nv;
        $nv->NgaySinh = $request->ngaysinh_nv;
        $nv->GioiTinh = $request->gioitinh;
        $nv->DiaChi = $request->diachi_nv;
        $nv->Quyen = $request->Quyen;
        $nv->Email = $request->email;
        $nv->Username = $request->username;
        $nv->Password = md5($request->password);

        var_dump($nv);
        $n = $nv->save();

        $data = array();
        $data['MaNV'] = $request->ma_nv;
        $data['SDT'] = $request->sdt_nv;
        DB::table('sdt_nv')->insert($data);
        Alert::success('Thêm thành công');

        return redirect('nhan_vien/xem_nhan_vien');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($MaNV)
    {
        //$arr_chuoi = explode('/', $MaNV);
        //$_MaNV = $arr_chuoi[count($arr_chuoi) - 1];
        $nv = NhanVien::join('sdt_nv', 'sdt_nv.MaNV', '=', 'nhan_vien.MaNV')
            ->select("nhan_vien.*", "sdt_nv.SDT")
            ->where('nhan_vien.MaNV', $MaNV)
            ->get();
        return view('layout/nhan_vien/thong_tin_nhan_vien', ['nv' => $nv]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($MaNV)
    {
        $nv = NhanVien::join('sdt_nv', 'sdt_nv.MaNV', '=', 'nhan_vien.MaNV')->select("nhan_vien.*", "sdt_nv.SDT")->where('nhan_vien.MaNV', $MaNV)->get();
        return view('layout/nhan_vien/sua_nhan_vien', ['nv' => $nv]);
    }

    public function postEdit(Request $request, $MaNV)
    {
        $nv = NhanVien::find($MaNV);
        $nv->TenNV = $request->ten_nv;
        $nv->NgaySinh = $request->ngaysinh_nv;
        $nv->GioiTinh = $request->gioitinh;
        $nv->DiaChi = $request->diachi_nv;
        $nv->Quyen = $request->Quyen;
        $n = $nv->save();
        DB::table('sdt_nv')->where('MaNV', $MaNV)->update(['SDT' => $request->sdt_nv]);

        Alert::success('Cập nhật thành công');
        return redirect('nhan_vien/xem_nhan_vien');
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
    public function destroy($MaNV)
    {
        $n = DB::table('sdt_nv')->where('MaNV', $MaNV)->delete();
        if ($n) {
            NhanVien::where('MaNV', $MaNV)->delete();
            Alert::success('Xóa thành công');
        }
        return back();
    }
}
