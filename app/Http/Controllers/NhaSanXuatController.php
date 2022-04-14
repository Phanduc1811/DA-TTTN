<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NhaSanXuat;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class NhaSanXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $DsNSX = NhaSanXuat::join('sdt_nsx', 'sdt_nsx.MaNSX', '=', 'nha_san_xuat.MaNSX')->select("nha_san_xuat.*", "sdt_nsx.SDT")->get();
        return view('layout/nha_san_xuat/xem_nha_san_xuat',['DsNSX' => $DsNSX]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('layout/nha_san_xuat/them_nha_san_xuat');
    }

    public function postCreate(Request $request)
    {
        $nsx = new NhaSanXuat;
        $nsx -> MaNSX = $request->ma_nsx;
        $nsx -> TenNSX = $request->ten_nsx;
        $nsx -> DiaChi = $request->diachi_nsx;
        $n =$nsx->save();

        $data = array();
        $data['MaNSX'] = $request->ma_nsx;
        $data['SDT'] = $request->sdt_nsx;
        DB::table('sdt_nsx')->insert($data);
        Alert::success('Thêm thành công');
        return redirect('nha_san_xuat/xem_nha_san_xuat');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($MaNSX)
    {
        //$arr_chuoi = explode('/', $MaNSX);
        //$_MaNSX = $arr_chuoi[count($arr_chuoi) - 1];
        $nsx=NhaSanXuat::join('sdt_nsx', 'sdt_nsx.MaNSX', '=', 'nha_san_xuat.MaNSX')->select("nha_san_xuat.*", "sdt_nsx.SDT")->where('nha_san_xuat.MaNSX', $MaNSX)->get();
        return view('layout/nha_san_xuat/thong_tin_nha_san_xuat',['nsx'=>$nsx]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($MaNSX)
    {
        $nsx=NhaSanXuat::join('sdt_nsx', 'sdt_nsx.MaNSX', '=', 'nha_san_xuat.MaNSX')->select("nha_san_xuat.*", "sdt_nsx.SDT")->where('nha_san_xuat.MaNSX', $MaNSX)->get();
        return view('layout/nha_san_xuat/sua_nha_san_xuat',['nsx'=>$nsx]);
    }

    public function postEdit(Request $request,  $MaNSX )
    {
        $nsx=NhaSanXuat::find($MaNSX);
        $nsx -> TenNSX = $request->ten_nsx;
        $nsx -> DiaChi = $request->diachi_nsx;
        $n = $nsx->save();

        // $data = array();
        // $data['MaNSX'] = $nsx;
        // $data['SDT'] = $request->sdt_nsx;

        DB::table('sdt_nsx')->where('MaNSX', $MaNSX)->update(['SDT' => $request->sdt_nsx]); 
        
        Alert::success('Cập nhật thành công');

        return redirect('nha_san_xuat/xem_nha_san_xuat')->with('success','Sửa thành công!');
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
    public function destroy($MaNSX)
    {
        $n = DB::table('sdt_nsx')->where('MaNSX',$MaNSX)->delete();
        if($n){
            NhaSanXuat::where('MaNSX',$MaNSX)->delete();
            Alert::success('Xóa thành công');
        }
        return back();
    }
}
