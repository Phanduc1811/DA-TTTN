<?php

namespace App\Http\Controllers;

use App\Models\NhaSanXuat;
use App\Models\VatTu;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;


class VatTuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $DsVatTu = VatTu::get()->all();
        return view('layout/vat_tu/danh_sach_vat_tu', ['DsVatTu' => $DsVatTu]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function detail()
    {
        //return view('layout/vat_tu/thong_tin_vat_tu');
    }
    public function fix()
    {

        return view('layout/vat_tu/sua_vat_tu');
    }

    public function create()
    {
        $NSX = NhaSanXuat::get();
        return view('layout/vat_tu/them_vat_tu', ['NSX' => $NSX]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public $timestamps = false;
    const UPDATED_AT = false;
    public function store(Request $request)
    {

        $this->validate($request, [

            'ma_vt' => 'required',
            'ten_vt' => 'required',
            'dvt' => 'required',
            'don_gia' => 'required',
            'so_luong' => 'required',
            'ma_nsx' => 'required',
            'hinh' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',

        ]);
        $name_hinh = '';
        if ($request->hasFile('hinh')) {
            if ($request->file('hinh')->isValid()) {
                $file = $request->file('hinh');
                $name_hinh = $file->getClientOriginalName();
                $file->move('resources/css_js_user/images', $name_hinh);
            }
        }
        $data = $request->all();
        $vt = new VatTu();
        try {

            $vt->MaVT = $data['ma_vt'];
            $vt->TenVT = $data['ten_vt'];
            $vt->DvTinh = $data['dvt'];
            $vt->DonGia = $data['don_gia'];
            $vt->SoLuong = $data['so_luong'];
            $vt->MaNSX = $data['ma_nsx'];
            $vt->Anh=$name_hinh;
            $vt->save();
            Alert::success('Th??m th??nh c??ng');
            return redirect('vat_tu/xem_vat_tu');
        } catch (\Throwable $th) {
            Alert::error('Th??m kh??ng th??nh c??ng');
            $error_code = $th->errorInfo[1];
            if ($error_code == 1062) {
                return redirect('vat_tu/xem_vat_tu');
            }
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($MaVT)
    {
        $arr_chuoi = explode('/', $MaVT);
        $_MaVT = $arr_chuoi[count($arr_chuoi) - 1];
        $vt = VatTu::find($_MaVT);
        // $vt = VatTu::where('vat_tu.MaVT', $_MaVT)->get();
        $nsx = DB::table('nha_san_xuat')->join('vat_tu', 'nha_san_xuat.MaNSX', 'vat_tu.MaNSX')->where('vat_tu.MaVT', $_MaVT)->get();

        return view('layout/vat_tu/thong_tin_vat_tu', ['vt' => $vt, 'nsx' => $nsx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($MaVT)
    {
        $arr_chuoi = explode('/', $MaVT);
        $_MaVT = $arr_chuoi[count($arr_chuoi) - 1];
        //$vt = VatTu::where('vat_tu.MaVT', $_MaVT);
        $vt = VatTu::find($MaVT);
        $nsx = DB::table('nha_san_xuat')->join('vat_tu', 'nha_san_xuat.MaNSX', 'vat_tu.MaNSX')->where('vat_tu.MaVT', $_MaVT)->get();
        $nhasanxuat = NhaSanXuat::get();
        return view('layout/vat_tu/sua_vat_tu', ['vt' => $vt, 'nsx' => $nsx, 'nhasanxuat' => $nhasanxuat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $MaVT)
    {
        $arr_chuoi = explode('/', $MaVT);
        $_MaVT = $arr_chuoi[count($arr_chuoi) - 1];
        $vt = VatTu::find($_MaVT);
        $data = $request->all();


        $vt->TenVT = $data['ten_vt'];
        $vt->DVTinh = $data['dvt'];
        $vt->DonGia = $data['don_gia'];
        $vt->SoLuong = $data['so_luong'];
        $vt->MaNSx =  $data['ma_nsx'];
        $result = $vt->save();
        if ($result) {
            Alert::success('C???p nh???t th??nh c??ng');
            return redirect('/vat_tu/xem_vat_tu');
        } else {
            Alert::success('C???p nh???t kh??ng th??nh c??ng');
            return redirect('/vat_tu/xem_vat_tu');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($MaVT)
    {
        $arr_chuoi = explode('/', $MaVT);
        $_MaVT = $arr_chuoi[count($arr_chuoi) - 1];
        $vt = VatTu::find($_MaVT);
        $result = $vt->delete();
        Alert::success('X??a th??nh c??ng');
        return redirect('vat_tu/xem_vat_tu');
    }
}
