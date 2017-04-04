<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests\LoaiSanPhamRequest;
use  App\LoaiSanPham;

class LoaiSanPhamController extends Controller
{
	public function getList()
	{
		$data=LoaiSanPham::select('id','TenLoai')->orderBy('id','DESC')->get()->toArray();
		return view('admin.cate.list',compact('data'));
	}

    public function getAdd()
    {
    	return view('admin.cate.add');
    }
    public function postAdd(LoaiSanPhamRequest $request)
    {
    	$loai=new LoaiSanPham;
    	$loai->Tenloai=$request->txtTenLoai;
    	$loai->save();
    	// print_r($request ->txtTenLoai);
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Thêm loại sản phẩm thành công !!!']);
    }

    public function getEdit($id)
	{
		$data=LoaiSanPham::findOrFail($id)->toArray();
		return view('admin.cate.edit',compact('data','id'));
	}
	// su dung Request mac dinh 
	public function postEdit(Request $request,$id)
    {
    	$this->validate($request,["txtTenLoai"=>"required"],["txtTenLoai.required"=>"Vui lòng nhập tên loại sản phẩm."]);
    	$loai=LoaiSanPham::find($id);
    	//print_r($loai);
    	$loai->Tenloai=$request->txtTenLoai;
    	$loai->save();
    	// print_r($request ->txtTenLoai);
    	return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa loại sản phẩm thành công !!!']);

    }

    public function getDelete($id)
	{
		//echo $id;
		$loai = LoaiSanPham::find($id);
		$loai->delete($id);
		return redirect()->route('admin.cate.list')->with(['flash_level'=>'success','flash_message'=>'Đã xóa thành công loại sản phẩm!!!']);
	}
}
