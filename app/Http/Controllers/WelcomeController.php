<?php

namespace App\Http\Controllers;

use App\DonDatHang;
use Carbon\Carbon;
use DB ;
use Mail ;
use App\feedbacks;
use Cart ;
use Illuminate\Http\Request;
use App\Http\Requests\FeedbackRequest;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\UserRequest;
use App\User;
use App\ChiTietDonDatHang;
use Hash;
use Auth;

class WelcomeController extends Controller
{
    public function loaisanpham($id)
    {
    	$product = DB::table('sanpham')->select('id','TenSanPham','GiaBan','HinhAnh','IdLoai')->where('IdLoai',$id)->paginate(15);
        //print_r($product);
    	return view('user.pages.category',compact('product'));
    }
    public function nhasanxuat($id)
    {
    	$product = DB::table('sanpham')->select('id','TenSanPham','GiaBan','HinhAnh','IdNsx')->where('IdNsx',$id)->paginate(1);
    	return view('user.pages.category',compact('product'));
    }
    public function chitietsanpham($id)
    {
    	$product_detail = DB::table('sanpham')->where('id',$id)->first();
        $product_cate=DB::table('sanpham')->where('IdLoai',$product_detail->IdLoai)->where('id','<>',$id)->take(4)->get();
    	return view('user.pages.detail_product',compact('product_detail','product_cate'));

    }
    public function get_lienhe()
    {
    	return view('user.pages.contact');
    }
    public function post_lienhe(Request $request)
    {
    	$data =['hoten'=> Request::input('name'),'tinnhan'=> Request::input('message')];
    	Mail::send('user.emails.blà nks', $data, function ($msg){
    		$msg->from ('dongithutech2@gmail.com','thanh dong');
    		$msg->to ('dongithutech2@gmail.com','thanh ')->subject('Đây là mail đông');
    	});
    	echo "<script>
    		alert('Cảm ơn bạn đã góp ý.Chúng tôi sẽ liên hệ lại bạn sớm nhất');
    		window.location = '" .url('/')."'

    	</script>";
    }

    public function checout($id)
    {
    	$product_buy = DB::table('sanpham')->where('id',$id)->first();
        Cart::add(array('id'=>$id,'name'=>$product_buy->TenSanPham,'qty'=>1,'price'=>$product_buy->GiaBan,'options'=>array('hinh'=>$product_buy->HinhAnh)));
    	$content =Cart::content();
       // print_r($content);
        return redirect()->route('giohang');
    }
    public function giohang()
    {
        $content = Cart::content();
        $total = Cart::total();
        $count=Cart::count();
    	return view('user.pages.shoppingcart',compact('content','total','count'));
    }
    public function xoasanpham ($id)
    {
        Cart::remove($id);
        return redirect()->route('giohang');
    }
     public function updateCart ()
    {
        if(Request::ajax())
        {
            $id = Request::get('id');
            $qty = Request::get('qty');
            Cart::update($id,$qty);
                echo "oke";
        }   
    }
    //login user
    public function getLogout()
    {
        Auth::logout();
        return view('user.pages.home');
    }
    public function getLogin()
    {
        return view('user.login');
    }
    public function postLogin(LoginRequest $request)
    {
        $login= array(
            'name' =>$request->txtUser , 
            'password' =>$request->txtPassword
        );
        if(Auth::attempt($login))
        {
           // return  "Đăng nhập okie";
           return redirect()->route('user.pages.home');
        }
        else
        {
            return redirect()->back()->with('error','Vui lòng kiểm tra lại tài khoản hoặc mật khẩu !!!');
        }
    }

    public function getRegister()
	{
		return view('user.register');
	}
	public function postRegister(UserRequest $request)
	{
		$user=new User();
		$user->name=$request->txtUser;
		$user->email=$request->txtEmail;
		$user->Ho=$request->txtHo;
		$user->Ten=$request->txtTen;
		$user->DiaChi=$request->txtDiaChi;
		$user->SDT=$request->txtSDT;
		$user->level=$request->rdoLevel;
		$user->password=Hash::make($request->txtPass);
		$user->remember_token=$request->_token;  	
		$user->save();
        //return "tạo thành công";
		return redirect()->route('giohang')->with(['flash_level'=>'success','flash_message'=>'Đăng kí thành công !!!']);
	}
    public function getThanhToan()
    {
        if (Auth::check()){

            //gio hang
            $content = Cart::content();
            $total = Cart::total();
            $count=Cart::count();
            //$data=User::findOrFail($id)->toArray();
            //return view('user.pages.shoppingcart',compact('content','total'));
            return view('user.pages.thanhtoan',compact('content','total','count'));
        }
        else {
            return redirect()->route('user.login.getLogin');
        }
    }
    public function postThanhToan(Request $request)
    {
        $cart=Cart::content();
//        foreach($cart as $item)
//            return json_encode($item);
        $ddh=new DonDatHang();

        $ddh->IdUser=$request->txtID;
        $ddh->NgayDat=Carbon::now()->format('Y-m-d');
        $ddh->NgayGiao=$request->txtNgayGiao;
        $ddh->DaThanhToan=false;
        $ddh->TinhTrangGiao=false;
        $ddh->save();

        foreach ($cart as $item)
        {
            $ctddh=new ChiTietDonDatHang();
            $ctddh->IdDonDatHang=$ddh->id;
            $ctddh->IdSanPham=$item->id;
            $ctddh->SoLuong= $item->qty;
            $ctddh->GiaBan=$item->price;
            $ctddh->ThanhTien=$item->total;
            $ctddh->save();
        }
       // return "thành công";
       return redirect()->route('user.pages.home')->with(['flash_level'=>'success','flash_message'=>'Thêm loại sản phẩm thành công !!!']);
    }
    public function timkiem(Request $req)
    {
        $tukhoa1 = $req->txttukhoa;
        $sanpham = DB::table('sanpham')->where('TenSanPham','like',"%$tukhoa1%")->take(6)->paginate(2);
        return view('user.pages.timkiem',['sanpham'=>$sanpham,'tukhoa'=>$tukhoa1]);
    }
    public function lienhe()
    {
        return view('user.pages.lienhe');
    }
    public function gioithieu()
    {
        return view('user.pages.gioithieu');
    }
}
