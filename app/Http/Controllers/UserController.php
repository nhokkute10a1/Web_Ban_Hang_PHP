<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\User;
use Hash;
use Auth;



class UserController extends Controller
{
	public function getList()
	{
		$user=User::select('id','name','email','Ho','Ten','DiaChi','SDT','level')->orderBy('id','DESC')->get()->toArray();
		return view('admin.user.list',compact('user'));
		//return view('admin.user.list');
	}

	public function getAdd()
	{
		return view('admin.user.add');
	}
	public function postAdd(UserRequest $request)
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
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Thêm loại thành viên thành công !!!']);
	}
	public function getEdit($id)
	{  
		/*kiểm soát phép sửa 
		1: admin->supperuser
		2: admin-> admin (ko phải chính mình)*/
		$data=User::findOrFail($id)->toArray();
		if((Auth::user()->id!=1) && ($id==1 || ($data["level"]==1 && (Auth::user()->id!=$id))))
		{
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Bạn không có quyền sửa hoặc cập nhập tài khoản !!!']);
		}
		return view('admin.user.edit',compact('data','id'));
	}
	// su dung Request mac dinh 
	public function postEdit($id,Request $request)
	{
		$user=User::find($id);
    	if($request->input('txtPass'))
    	{
    		$this->validate($request,
    			['txtRePass'=>'same:txtRePass'],
    			['txtRePass.same'=>'Mật khẩu nhập lại không đúng']
    			);
    		$pass=$request->input('txtPass');
    		$user->password=Hash::make($request->$pass);
    	}
		$user->email=$request->txtEmail;
		$user->Ho=$request->txtHo;
		$user->Ten=$request->txtTen;
		$user->DiaChi=$request->txtDiaChi;
		$user->SDT=$request->txtSDT;
		$user->level=$request->rdoLevel;	
		$user->remember_token=$request->input('_token');  	
		$user->save();
    	// print_r($request ->txtTenLoai);
		return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Sửa thành công thông tin thành viên !!!']);

	}

	public function getDelete($id)
	{
		$user_current_login=Auth::user()->id;
		$user=User::find($id);
		if(($id==1) || ($user_current_login!=1 && $user["level"==1]) ){
			return redirect()->route('admin.user.list')->with(['flash_level'=>'danger','flash_message'=>'Không được xóa thành viên !!!']);
		}else
		{
			$user->delete($id);
			return redirect()->route('admin.user.list')->with(['flash_level'=>'success','flash_message'=>'Xóa thành công 1 thành viên !!!']);
		}
	}
}
