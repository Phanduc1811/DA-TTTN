<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Carbon\Carbon;
use Mail;


class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function checkLogin(){
        // Lấy id user từ trong session //
        $isLogin = Auth::guard('user')->check();
        // Nếu id user = null - chưa đăng nhập, return về trang đăng nhập //
        if(!$isLogin)
            return redirect('/login')->send();
    }

    public function index()
    {
    
        $contentCart = Cart::content();
        // Lấy sản phẩm trong giỏ hàng //
       // $contentCart = Cart::content();
        
        return view('layout/user/cart')
        ->with('contentCart', $contentCart);
    }

    // Thêm sản phẩm trong giỏ hàng
    public function addCart(Request $request){
        $data = array();
        $pro_id = $request->product_id; // Lấy mã sản phẩm //
        $qty_pro = $request->qty_pro; // Lấy số lượng của sản phẩm //

        
        // Kiểm tra số lượng sản phẩm có hợp lệ //
        if($qty_pro < 1){
            Alert::error('Số lượng sản phẩm không hợp lệ');
            return redirect()->back();
        }

        $vt = DB::table("vat_tu")
        ->join("nha_san_xuat", function($join){
            $join->on("vat_tu.MaNSX", "=", "nha_san_xuat.MaNSX");
        })
        ->where("vat_tu.MaVT", "=", $pro_id)
        ->select("vat_tu.*", "nha_san_xuat.TenNSX")
        ->first();
        
        // // Lấy thông tin của sản phẩm, slug của danh mục sp, slug của thương hiệu, tên danh mục, tên thương hiệu //
        
        // // Gán các thông tin của sản phẩm vào mảng data;
        $data['id']= $vt->MaVT;
        $data['qty']= $qty_pro;
        $data['price']= $vt->DonGia;
        $data['name']= $vt->TenVT;
        $data['weight'] = 500;
        $data['options']['image']= $vt->Anh;
        $data['options']['brand']= $vt->TenNSX;

        var_dump($data);


        // // add data vào đối tượng cart //
        Cart::add($data);
        Alert::success('Thêm giỏ hàng thành công');

        return redirect('/cart');
    }

    // Xóa tất cả sản phẩm trong giỏ hàng //
    public function DeleteAllCart(){
        if(Cart::count() != 0){
            Cart::destroy();
        }
        return redirect()->back();
    }

    // Cập nhật số lượng sản phẩm trong giỏ hàng //
    public function updateCart(Request $request){
        $data = array();
        $data = $request->quanlity; // Mảng số lượng 
        $i = 0; // Biến đếm bao nhiêu sản phẩm đc cập nhật thành công //
    
        // Duyệt từng số lượng sản phẩm trong mảng //
       foreach($data as $key => $qty_pro){
           $rowId = $key;
           $qty = $qty_pro;
            // Nếu số lượng sản phẩm > 0 thì mới cập nhật //
           if($qty > 0){
                $i++;
                Cart::update($rowId, $qty);
           }    
       }
        if($i > 0)
            Alert::success('Cập nhật thành công '.$i.' sản phẩm');
        else
            Alert::error('Cập nhật thất bại');
        return redirect()->back();
    }

    // Xóa sản phẩm trong giỏ hàng //
    public function DeleteItemCart($rowId){
        Cart::remove($rowId);
        return redirect()->back();
    }


    // Trang đặt hàng của frontend //
    public function order(){
        // Check login //
       $n = $this->checkLogin();
       // Người dùng chưa đăng nhập // 
        if($n == -1){
            Alert::error('Vui lòng đăng nhập tài khoản để đặt hàng');
            return Redirect::to('/login.html');
        }

        // // end header

        // Lấy id user //
        $users_id = Auth::guard('user')->user()->MaKH;
        
        // Lấy thông tin user dựa vào id //
        $info_user = DB::table('khach_hang')->where('MaKH', $users_id)->get();
        $sdt_user = DB::table('sdt_kh')->where('MaKH', $users_id)->first();

        $cart_content = Cart::content();

        return view('layout/user/order')
        ->with('cart_content',$cart_content)
        ->with('info_user', $info_user)
        ->with('sdt_user', $sdt_user);
    }

    // Gửi mail xác nhận đặt hàng //
    public function sendMailOrder($data, $cart_content, $email){
        $title_mail = "Xác nhận đặt hàng ";
        //$to_email = $email;
        $data['email'] = $email; //send to this email
    
        Mail::send('layout.user.notify_orderMail', ['data'=>$data, 'oderDetail' =>$cart_content] , function($message) use ($title_mail,$data){
		    $message->to($data['email'])->subject($title_mail);//send this mail with subject
		    $message->from($data['email'], 'Ngọc Thủy');//send from this mail
	    });
        //--send mail
        return true;
    }

    // Xử lý đặt hàng //
    public function handleOrder(Request $request){
        $data = array();

        $total = $request->total_price;
        $pos = strpos($total, '.');

        $sub_total = str_replace(",","",substr($total, 0, $pos));

        // var_dump($request->order_NameCus); exit;
        // Thêm vào data đơn hàng //
        $email = $request->order_cusEmail;
        $num = mt_rand(1, 9999); 
        $data['MaDDH'] = 'DDH' . $num;
        $data['DiaChi'] = $request->order_cusAddress;
        $data['TenNguoiNhan'] = $request->order_cusName;
        $data['ThanhTien'] = $sub_total;
        $data['TrangThai'] = 0;
        $data['MaKH'] = $request->users_id;
        $data['NgayLapDDH'] = Carbon::now('Asia/Ho_Chi_Minh');
        $data['NgayGiaoHang'] = Carbon::now('Asia/Ho_Chi_Minh')->addDays(7);

        
    
        DB::table('don_dat_hang')->insert($data);

        // Thêm vào data chi tiết đơn hàng //

        // // Lấy id đơn hàng vừa thêm //
        // $get_id_order = DB::table('don_dat_hang')->select('MaDDH')->orderBy('MaDDH', 'DESC')->first();

        // $id_order = $get_id_order->MaDDH;

        // var_dump($id_order); exit;
   

        $cart_content = Cart::content();
        $dataChiTiet = array();
        $dataChiTiet['MaDDH'] = $data['MaDDH'];
        // Lấy tất cả sản phẩm trong giỏ hàng thêm vào chi tiết đơn hàng //
        foreach($cart_content as $key =>$cart_pro){
            $dataChiTiet['MaVT'] = $cart_pro->id;
            $dataChiTiet['DonGia'] = $cart_pro->price;
            $dataChiTiet['SoLuong'] = $cart_pro->qty;
            DB::table('ct_ban_hang')->insert($dataChiTiet);
        }
        // Gửi mail xác nhận đặt hàng - Tham số truyền vào: $data: đơn hàng, $cart_content: giỏ hàng, $email: email của khách hàng //
        $this->sendMailOrder($data, $cart_content, $email);
        Cart::destroy();
        Alert::success('Đặt hàng thành công');
        return Redirect::to('/');
    }

    

   
}
