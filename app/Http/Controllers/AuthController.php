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

    
}