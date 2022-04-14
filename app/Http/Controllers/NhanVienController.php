<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use Redirect;
use DB;
use RealRashid\SweetAlert\Facades\Alert;

class NhanVienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_nv = Staff::join('sdt_nv', 'sdt_nv.MaNV', '=', 'nhan_vien.MaNV')
        ->select("nhan_vien.*", 'sdt_nv.SDT')->get();
        
        return view('layout/nhan_vien/danh_sach_nhan_vien')->with('all_nv', $all_nv);
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
     public function detail()
     {
         return view('layout/nhan_vien/thong_tin_nhan_vien');
     }
     public function fix()
     {
         return view('layout/nhan_vien/sua_nhan_vien');
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
