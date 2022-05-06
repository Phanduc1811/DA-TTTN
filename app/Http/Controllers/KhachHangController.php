<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Customer;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;



class KhachHangController extends Controller
{
    public function checkLogin()
    {
        // Lấy id user từ trong session //
        $isLogin = Auth::guard('admin')->check();
        // Nếu id user = null - chưa đăng nhập, return về trang đăng nhập //
        if (!$isLogin)
            return redirect('/admin-login.php')->send();
    }

    public function index()
    {
        $this->checkLogin();
        // $all_khachHang = DB::table('khach_hang')->get();
        $all_khachHang = Customer::join('sdt_kh', 'sdt_kh.MaKH', '=', 'khach_hang.MaKH')
            ->select("khach_hang.*", "sdt_kh.SDT")->get();

        return view('layout/khach_hang/danh_sach_khach_hang')->with('all_khachHang', $all_khachHang);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->checkLogin();
        return view('layout/khach_hang/them_khach_hang');
    }


    // Chức năng thêm khách hàng vào db // 
    public function handleCreateCustomer(Request $request)
    {
        // Check Login //
        $this->checkLogin();

        // End check login //

        // Kiểm tra trùng id //
        $kh = Customer::select('MaKH', 'TenKH')->where('MaKH', $request->customer_id)->get();

        if (count($kh) > 0) {
            Alert::error('Mã khách hàng đã tồn tại');
            return redirect()->back();
        } else {
            $cus = new Customer();
            $cus->MaKH = $request->customer_id;
            $cus->TenKH = $request->customer_name;
            $cus->GioiTinh = $request->radGender;
            $cus->DiaChi = $request->address;
            $cus->GhiChu = $request->customer_note;

            $n = $cus->save();

            var_dump($n);

            if (!$n) {
                Alert::error('Thêm thất bại');
                return redirect()->back();
            } else {
                $data = array();
                $data['MaKH'] = $request->customer_id;
                $data['SDT'] = $request->customer_phone;

                DB::table('sdt_kh')->insert($data);

                Alert::success('Thêm thành công');
                return redirect()->back();
            }
        }
    }

    public function detail($cus_id)
    {
        $this->checkLogin();
        $kh = Customer::join('sdt_kh', 'sdt_kh.MaKH', '=', 'khach_hang.MaKH')
            ->select("khach_hang.*", "sdt_kh.SDT")->where('khach_hang.MaKH', $cus_id)->get();

        if (count($kh) > 0) {
            return view('layout/khach_hang/thong_tin_khach_hang')->with('edit_cus', $kh);
        } else {
            Alert::error('Khách hàng không tồn tại');
            return redirect()->back();
        }
    }
    public function fix($cus_id)
    {
        $this->checkLogin();
        $kh = Customer::join('sdt_kh', 'sdt_kh.MaKH', '=', 'khach_hang.MaKH')
            ->select("khach_hang.*", "sdt_kh.SDT")->where('khach_hang.MaKH', $cus_id)->get();

        if (count($kh) > 0) {
            return view('layout/khach_hang/sua_khach_hang')->with('edit_cus', $kh);
        } else {
            Alert::error('Khách hàng không tồn tại');
            return redirect()->back();
        }
    }

    public function updateCustomer(Request $request, $cus_id)
    {

        $cus = Customer::find($cus_id);

        $cus->TenKH = $request->customer_name;
        $cus->GioiTinh = $request->radGender;
        $cus->DiaChi = $request->address;
        $cus->GhiChu = $request->customer_note;

        $n = $cus->save();

        if (!$n) {
            Alert::error('Cập nhật thất bại');
            return redirect('/khach_hang/xem_khach_hang');
        } else {
            DB::table('sdt_kh')->where('MaKH', $cus_id)->update(['SDT' => $request->customer_phone]);

            Alert::success('Cập nhật thành công');
            return redirect('/khach_hang/xem_khach_hang');
        }
    }

    public function deleteCustomer($cus_id)
    {
        $n = DB::table('sdt_kh')->where('MaKH', $cus_id)->delete();
        if ($n) {
            Customer::where('MaKH', $cus_id)->delete();
            Alert::success('Xóa thành công');
            return redirect('/khach_hang/xem_khach_hang');
        } else {
            Alert::error('Xóa thất bại');
        }
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
