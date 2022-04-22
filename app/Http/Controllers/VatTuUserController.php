<?php

namespace App\Http\Controllers;

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
        $vt=VatTu::Paginate(10);
        return view('master_user',['vt'=>$vt]);
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
        return view('layout/user/chi_tiet_vat_tu', ['vt' => $vt,'nsx'=>$nsx]);
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
