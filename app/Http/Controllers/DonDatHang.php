<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\VatTu;
use App\Models\ctBanHang;
use App\Models\Customer;
use Carbon\Carbon;
use DateTime;
use RealRashid\SweetAlert\Facades\Alert;
use Symfony\Component\Console\Input\Input;

class DonDatHang extends Controller
{

    public function checkLogin()
    {
        // Lấy id user từ trong session //
        $isLogin = Auth::guard('admin')->check();
        // Nếu id user = null - chưa đăng nhập, return về trang đăng nhập //
        if (!$isLogin)
            return redirect('/admin-login.php')->send();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->checkLogin();

        $all_ddh = DB::table('don_dat_hang')
            ->select('don_dat_hang.*', DB::raw('sum(ct_ban_hang.SoLuong) as SoLuong'))
            ->join('ct_ban_hang', 'don_dat_hang.MaDDH', '=', 'ct_ban_hang.MaDDH')
            ->groupBy('don_dat_hang.MaDDH')
            ->get();

        return view('layout/don_hang/danh_sach_don_dat_hang')->with('all_ddh', $all_ddh);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dskh = DB::table('don_dat_hang')
            ->join('ct_ban_hang', 'don_dat_hang.MaDDH', '=', 'ct_ban_hang.MaDDH')
            ->join('khach_hang', 'don_dat_hang.MaKH', '=', 'khach_hang.MaKH')
            ->select('khach_hang.*')->distinct()
            ->get();
        $dsvt = VatTu::paginate(7);
        $date = Carbon::now();

        return view('layout/don_hang/tao_don_dat_hang', ['dsvt' => $dsvt, 'dskh' => $dskh, 'date' => $date]);
        //return view('layout/don_hang/tao_don_dat_hang');
    }
    public function detail($maddh)
    {

        $ddh = ctBanHang::join('vat_tu', 'ct_ban_hang.MaVT', '=', 'vat_tu.MaVT')
            ->join('don_dat_hang', 'ct_ban_hang.MaDDH', '=', 'don_dat_hang.MaDDH')
            ->select("vat_tu.*", "ct_ban_hang.*")
            ->where('don_dat_hang.MaDDH', $maddh)
            ->get();
        // $kh = Order::join('khach_hang', 'don_dat_hang.MaKH', '=', 'khach_hang.MaKH')
        //     ->select("don_dat_hang.*", "khach_hang.*")
        //     ->where('khach')
        //     ->get();
        //var_dump($maddh);
        return view('layout/don_hang/chi_tiet_don_dat_hang', ['ddh' => $ddh]);
    }
    public function fix()
    {
        return view('layout/don_hang/sua_don_dat_hang');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDDH(Request $request)
    {
        $ddh = new DonDatHang();
        //$input = $request->all();
        $ddh->MaDDH = $request->ma_ddh;
        $ddh->NgayLapDDH = $request->ngay_dat;
        $ddh->NgayGiaoHang = $request->ngay_giao;
        $ddh->DiaChi = $request->dia_chi;

        $ddh->MaKH = $request->ma_kh;

        $n = $ddh->save();

        Alert::success('Thêm Thành Công');
        return redirect('don_dat_hang/xem_don_dat_hang');
    }
    public function store(Request $request)
    {
        $ddh = new DonDatHang();
        //$input = $request->all();
        $ddh->MaDDH = $request->ma_ddh;
        $ddh->NgayLapDDH = Carbon::now();
        $ddh->NgayGiaoHang = $request->ngay_giao;

        //$ddh->MaKH = $request->ma_kh;

        $n = $ddh->save();

        Alert::success('Thêm Thành Công');
        return redirect('don_dat_hang/xem_don_dat_hang');
        // if (!$n) {
        //     Alert::error('Thêm thất bại');
        //     return redirect()->back();
        // } else {
        //     $data = array();
        //     $data['MaDDH'] = $request->ma_ddh;
        //     $data['SoLuong'] = count($request->ma_vt);
        //     DB::table('ct_ban_hang')->insert($data);
        //     return redirect()->back();
        // }
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
