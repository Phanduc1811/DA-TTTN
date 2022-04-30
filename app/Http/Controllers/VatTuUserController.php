<?php

namespace App\Http\Controllers;

use App\Models\NhaSanXuat;
use App\Models\SDT_NSX;
use App\Models\VatTu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VatTuUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vt=VatTu::Paginate(8);
        $nsx=NhaSanXuat::limit(4)->get();
        return view('master_user',['vt'=>$vt,'nsx'=>$nsx]);
    }

    public function userLogin(){
        // Lấy id user từ trong session //
        return view('layout/user/dang_nhap');
        
    }

    public function userRegister(){
        // Lấy id user từ trong session //
        return view('layout/user/dang_ky');
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    public function show($MaVT)
    {
       
        $vt = VatTu::find($MaVT);
        $nsx = DB::table('nha_san_xuat')->join('vat_tu', 'nha_san_xuat.MaNSX', 'vat_tu.MaNSX')->where('vat_tu.MaVT', $MaVT)->get();
        $listvt=VatTu::where('MaNSX','=', $vt->MaNSX)->where('MaVT','!=',$vt->MaVT)->limit(4)->get();
        return view('layout/user/chi_tiet_vat_tu', ['vt' => $vt,'nsx'=>$nsx,'listvt'=>$listvt]);
    }
    public function showNSX($MaNSX)
    {
       
        $nsx =NhaSanXuat:: find($MaNSX);
        $sdt=SDT_NSX::find($MaNSX);
        $listvt=VatTu::where('MaNSX','=', $nsx->MaNSX)->limit(4)->get();
        return view('layout/user/chi_tiet_nha_san_xuat', ['nsx' => $nsx,'sdt'=> $sdt,'listvt'=>$listvt]);
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
