<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NhaSanXuatRequest;
use  App\NhaSanXuat;

class NhaSanXuatController extends Controller
{
	public function getList()
	{
		$data=NhaSanXuat::select('id','TenNhaSanXuat','DiaChi','SDT')->orderBy('id','DESC')->get()->toArray();
		return view('admin.producer.list',compact('data'));
		//return view('admin.producer.list');
	}

    public function getAdd()
    {
    	return view('admin.producer.add');
    }
    public function postAdd(NhaSanXuatRequest $request)
    {
    	$loai=new NhaSanXuat;
    	$loai->TenNhaSanXuat=$request->txtTenNSX;
    	$loai->DiaChi=$request->txtDiaChi;
    	$loai->SDT=$request->txtSDT;
    	$loai->save();
    	// print_r($request ->txtTenLoai);
    	return redirect()->route('admin.producer.list')->with(['flash_level'=>'success','flash_message'=>'Thêm nhà sản xuất thành công !!!']);
    }

    public function getEdit($id)
	{
		$data=NhaSanXuat::findOrFail($id)->toArray();
		return view('admin.producer.edit',compact('data','id'));
		//return view('admin.producer.edit');
	}
	// su dung Request mac dinh 
	public function postEdit(NhaSanXuatRequest $request,$id)
    {
    	$loai=NhaSanXuat::find($id);
    	//print_r($loai);
    	$loai->TenNhaSanXuat=$request->txtTenNSX;
    	$loai->DiaChi=$request->txtDiaChi;
    	$loai->SDT=$request->txtSDT;
    	$loai->save();
    	// print_r($request ->txtTenLoai);
    	return redirect()->route('admin.producer.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa loại nhà sản xuất thành công !!!']);

    }

    public function getDelete($id)
	{
		//echo $id;
		$loai = NhaSanXuat::find($id);
		$loai->delete($id);
		return redirect()->route('admin.producer.list')->with(['flash_level'=>'success','flash_message'=>'Đã xóa thành công nhà sản xuất!!!']);
	}
}
