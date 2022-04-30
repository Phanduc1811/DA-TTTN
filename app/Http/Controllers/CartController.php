<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Gloudemans\Shoppingcart\Facades\Cart;
use Redirect;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
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
       // $n = $this->checkLogin();
        // Người dùng chưa đăng nhập // 
        // if($n == -1){
        //     Alert::error('Vui lòng đăng nhập tài khoản để đặt hàng');
        //     return Redirect::to('/login.html');
        // }else if($n == 0){ // Tài khoản người dùng chưa active //
        //     Alert::error('Vui lòng kích hoạt tài khoản để đặt hàng');
        //     return Redirect::to('/trang-chu.html');
        // }

        // // Header //
        // $cate_of_Apple = DB::table("danhmucsanpham")
        //     ->whereRaw('danhmucsanpham.maDanhMuc IN (select dbsanpham.maDanhMuc FROM dbsanpham JOIN thuonghieu on thuonghieu.maThuongHieu = dbsanpham.maThuongHieu WHERE thuonghieu.maThuongHieu = 1)')
        //     ->get();
        // $cate_of_Gear = DB::table("danhmucsanpham")
        //     ->select('tenDanhMuc', 'slug')
        //     ->where('danhMucCha', 14)
        //     ->get();
        // //var_dump($cate_of_Gear); exit;

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
