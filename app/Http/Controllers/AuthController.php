<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\NhanVien;
use Session;
use DB;
use Redirect;
use RealRashid\SweetAlert\Facades\Alert;


class AuthController extends Controller
{
    public function index(){
        // Lấy id user từ trong session //
        $isLogin = Auth::guard('admin')->check();
        // Nếu id user = null - chưa đăng nhập, return về trang đăng nhập //
        if(!$isLogin)
            return view('layout/login');
        return view('master');
        
    }

    // Chức năng đăng nhập user //
    public function loginUser(Request $request){

        // $this->validate($request, [
        //     'user_email'   => 'required|email|max:255', 
        //     'user_password' => 'required|min:6|max:255'
        // ],
        // [
        //     'user_email.required' => 'Email không được để trống',
        //     'user_password.required' => 'Email không được để trống',
        //     'user_email.email' => 'Email không đúng định dạng',
        //     'user_password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        //     'user_email.max' => 'Email quá 255 ký tự',
        //     'user_password.max' => 'Mật khẩu quá 255 ký tự',
        // ]);

        if (Auth::guard('user')->attempt(['Username' => $request->userName, 'Password' => $request->password])) {
            return redirect('/');
            //var_dump('OK');
        }else{
            //var_dump('Fail');
            Alert::error('Email hoặc mật khẩu sai');
            return redirect('/login');
        }
    }


    // Trả về trang đăng nhập của admin //
    public function adminLogin(){
        // Lấy id user từ trong session //
        $isLogin = Auth::guard('admin')->check();
        // Nếu id user = null - chưa đăng nhập, return về trang đăng nhập //
        if(!$isLogin)
            return view('layout/login');
        return redirect()->back();
        
    }

     // Chức năng đăng nhập admin //
     public function loginAdmin(Request $request){
        $this->validate($request, [
            'adminEmail'   => 'required|max:255', 
            'adminPass' => 'required|min:6|max:255'
        ],
        [
            'adminEmail.required' => 'Không được để trống',
            'adminPass.required' => 'Mật khẩu không được để trống',
            'adminPass.min' => 'Mật khẩu tối thiểu 6 kí tự',
            'adminEmail.max' => 'Email hoặc Username quá 255 ký tự',
            'adminPass.max' => 'Mật khẩu quá 255 ký tự',
        ]);


        var_dump($request->adminPass);

        if (Auth::guard('admin')->attempt(['Email' => $request->adminEmail, 'Password' => $request->adminPass])) {

            return redirect('/admin');
        }
        else if (Auth::guard('admin')->attempt(['Username' => $request->adminEmail, 'Password' => $request->adminPass])) {
            return redirect('/admin');

            return redirect('/admin/dashboard');
        }
        else if (Auth::guard('admin')->attempt(['Username' => $request->adminEmail, 'Password' => $request->adminPass])) {
            return redirect('/admin/dashboard');

        }
        else{
           Alert::error('Email hoặc mật khẩu sai');
            return redirect('/admin-login.php');
        }
    }

    // Đăng xuất cho admin
    public function logoutAdmin(){
        Auth::guard('admin')->logout(); 
        return redirect('/admin-login.php');
    }

    // Đăng xuất user //
    public function logoutUser(){
        Auth::guard('user')->logout(); 
        return redirect('/');
    }

    public function signInUser(Request $request){

        
        $length = 4;
        $randomletter = substr(str_shuffle("abcdefghijklmnopqrstuvwxyz"), 0, $length);
        var_dump($randomletter);

        // $this->validate($request, [
        //     'users_name' => 'bail|required|max:255', 
        //     'users_email'   => 'bail|required|email|max:255', 
        //     'users_password' => 'bail|required|min:6|max:255',
        //     'users_address' => 'bail|max:255',
        //     'users_phone' => 'bail|alpha_num|max:255',
        // ],
        // [
        //     'users_name.required' => 'Tên người dùng không được để trống',
        //     'users_email.required' => 'Email không được để trống',
        //     'users_password.required' => 'Email không được để trống',
        //     'users_email.email' => 'Email không đúng định dạng',
        //     'users_password.min' => 'Mật khẩu tối thiểu 6 kí tự',
        //     'users_email.max' => 'Email quá 255 ký tự',
        //     'users_password.max' => 'Mật khẩu quá 255 ký tự',
        // ]);


        $data = array();

        $data['MaKH'] = $randomletter;
        // Lấy value tên người dùng //
        $data['Username'] = $request->customer_username;
        // Lấy mật khẩu người dùng //
        $data['Password'] = md5($request->customer_password);
        $data['TenKH'] = $request->customer_name;

        $all_users = DB::table('khach_hang')->get();
        // Kiểm tra email vừa nhập đã tồn tại trong hệ thống chưa //
        foreach($all_users as $key => $u){
            if($u->Username == $data['Username']){
                Alert::error('Username đã tồn tại');
                return redirect()->back();
            }
        }
        // Lấy địa chỉ người dùng //
        $data['DiaChi'] = $request->customer_address;
        // Lấy sđt người dùng //
        $data['GioiTinh'] = $request->radGender;
        $data['GhiChu'] = $request->customer_note;

        var_dump($data);

        $n = DB::table('khach_hang')->insert($data);

        if($n > 0){
            $data2 = array();
            $data2['MaKH'] = $randomletter;
            $data2['SDT'] = $request->customer_phone;

            DB::table('sdt_kh')->insert($data2);

            Alert::success('Thêm thành công');
            return redirect('/login');
        }
        else
            Alert::error('Đăng ký thất bại');
        return redirect()->back();

    
        // // Insert data vào db //
        // $n = DB::table('users')->insert($data);
        // if($n > 0){
        //     // Lấy id user vừa mới thêm vào db //
        //     $users = DB::table('users')->orderBy('users_id', 'DESC')->first();
        //     $id = $users->users_id;
        //     // Gửi mail yêu cầu kích hoạt tài khoản //
        //     if($this->guiMailActive($data['users_email'],$id, $data['token'])){
        //         Alert::success('Gửi mail thành công. Vui lòng kiểm tra email để tiến hành kích hoạt tài khoản');
        //         return redirect()->back();  
        //     }
        // }
        // else
        //     Alert::error('Đăng ký thất bại');
        // return redirect()->back();
    }

    
}