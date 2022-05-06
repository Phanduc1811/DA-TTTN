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

use Illuminate\Support\Facades\Session;

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
            ->select("ct_ban_hang.*", "vat_tu.TenVT", "don_dat_hang.NgayLapDDH", "don_dat_hang.NgayGiaoHang")
            ->where('don_dat_hang.MaDDH', $maddh)
            ->get();
        $kh = Order::join('khach_hang', 'don_dat_hang.MaKH', '=', 'khach_hang.MaKH')
            ->join('sdt_kh', 'sdt_kh.MaKH', '=', 'don_dat_hang.MaKH')
            ->select("khach_hang.*", "sdt_kh.SDT")
            ->where('don_dat_hang.MaDDH', $maddh)
            ->first();
        // var_dump($ddh[0]); exit;

        return view('layout/don_hang/chi_tiet_don_dat_hang')->with('ddh', $ddh)->with('kh', $kh);
    }
    // public function fix()
    // {
    //     return view('layout/don_hang/sua_don_dat_hang');
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createDDH(Request $request)
    {

        $MaNV = Auth::guard('admin')->user()->MaNV;

        $ddh = new Order();
        $ddh->MaDDH = $request->ma_ddh;
        $ddh->DiaChi = $request->dia_chi;
        $ddh->MaKH = $request->ma_kh;
        $ddh->MaNV = $MaNV;
        $ddh->TrangThai = 0;


        $NgayLapDDH = Carbon::parse($request->ngay_dat);
        $NgayGiaoHang = Carbon::parse($request->ngay_giao);

        $ddh->NgayLapDDH = $NgayLapDDH;
        $ddh->NgayGiaoHang = $NgayGiaoHang;

        $thanhTien = 0;


        $id_vattu = $request->check;

        foreach ($id_vattu as $key => $id) {
            $data_vt = array();

            $vt = VatTu::find($id);

            $data_vt['DonGia'] = $vt->DonGia;
            $data_vt['SoLuong'] = 10;

            $thanhTien += $data_vt['DonGia'] * $data_vt['SoLuong'];
        }

        $ddh->ThanhTien = $thanhTien;

        $n = $ddh->save();

        foreach ($id_vattu as $key => $id) {
            $data_vt = array();

            $vt = VatTu::find($id);

            $data_vt['DonGia'] = $vt->DonGia;
            $data_vt['SoLuong'] = 10;
            $data_vt['MaDDH'] = $request->ma_ddh;
            $data_vt['MaVT'] = $id;
            DB::table('ct_ban_hang')->insert($data_vt);
        }

        Alert::success('Thêm Thành Công');
        return redirect()->back();
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

    public function setSession(Request $request)
    {

        // $test = $request->chk_id;

        // return $test;

        Session::put('chk_id', $request->chk_id);
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
    public function update(Request $request, $MaDDH)
    {
        $MaNV = Auth::guard('admin')->user()->MaNV;

        //var_dump($request->check);

        $ddh = Order::find($MaDDH);

        //$ddh->MaDDH = $MaDDH;
        $ddh->DiaChi = $request->dia_chi;
        $ddh->MaKH = $request->ma_kh;
        $ddh->MaNV = $MaNV;
        $ddh->TrangThai = 0;


        $NgayLapDDH = Carbon::parse($request->ngay_dat);
        $NgayGiaoHang = Carbon::parse($request->ngay_giao);

        $ddh->NgayLapDDH = $NgayLapDDH;
        $ddh->NgayGiaoHang = $NgayGiaoHang;

        $thanhTien = 0;


        $id_vattu = $request->check;

        //var_dump($id_vattu); exit;
        foreach ($id_vattu as $key => $id) {
            $data_vt = array();

            $vt = VatTu::find($id);

            $data_vt['DonGia'] = $vt->DonGia;
            $data_vt['SoLuong'] = 10;

            $thanhTien += $data_vt['DonGia'] * $data_vt['SoLuong'];
        }

        $ddh->ThanhTien = $thanhTien;

        $n = $ddh->save();

        foreach ($id_vattu as $key => $id) {
            $data_vt = array();

            $vt = VatTu::find($id);

            $data_vt['DonGia'] = $vt->DonGia;
            $data_vt['SoLuong'] = 10;
            $data_vt['MaDDH'] = $MaDDH;
            $data_vt['MaVT'] = $id;
            DB::table('ct_ban_hang')->insert($data_vt);
        }

        Alert::success('Cập nhật Thành Công');
        return redirect('/don_dat_hang/xem_don_dat_hang');
    }

    public function fix($ddh_id)
    {
        $this->checkLogin();
        $ddh = Order::join('khach_hang', 'khach_hang.MaKH', '=', 'don_dat_hang.MaKH')
            ->select("don_dat_hang.*", "khach_hang.MaKH")
            ->where('don_dat_hang.MaDDH', $ddh_id)->get();

        $ds_vt = ctBanHang::join('vat_tu', 'ct_ban_hang.MaVT', '=', 'vat_tu.MaVT')
            ->select("ct_ban_hang.*", "vat_tu.*")
            ->where('ct_ban_hang.MaDDH', $ddh_id)
            ->get();

        $dsvt = DB::table('vat_tu')->get();


        $data_vt = array();
        foreach ($dsvt as $key => $value) {
            $flag = false;
            foreach ($ds_vt as $key1 => $value1) {
                if ($dsvt[$key]->MaVT == $ds_vt[$key1]->MaVT) {
                    $flag = true;
                    break;
                }
            }
            if (!$flag) {
                array_push($data_vt, $dsvt[$key]);
                continue;
            }
        }
        $dskh = DB::table('don_dat_hang')
            ->join('ct_ban_hang', 'don_dat_hang.MaDDH', '=', 'ct_ban_hang.MaDDH')
            ->join('khach_hang', 'don_dat_hang.MaKH', '=', 'khach_hang.MaKH')
            ->select('khach_hang.*')->distinct()
            ->get();
        $date = Carbon::now();



        if (count($ddh) > 0) {
            return view('layout/don_hang/sua_don_dat_hang')
                ->with('ddh', $ddh)
                ->with('dsvt', $ds_vt)
                ->with('data_vt', $data_vt)
                ->with('date', $date)
                ->with('dskh', $dskh);
        } else {
            Alert::error('Đơn hàng không tồn tại');
            return redirect()->back();
        }
    }
    public function destroy($id)
    {
        $n = DB::table('ct_ban_hang')->where('MaDDH', $id)->delete();
        if ($n) {
            Order::where('MaDDH', $id)->delete();
            Alert::success('Xóa thành công');
            return redirect('/don_dat_hang/xem_don_dat_hang');
        } else {
            Alert::error('Xóa thất bại');
        }
    }
}
