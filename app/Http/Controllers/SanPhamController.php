<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use File;

use App\LoaiSanPham;
use App\NhaSanXuat;
use App\SanPham;
use App\Http\Requests\SanPhamRequest;

class SanPhamController extends Controller
{
	public function getList()
	{
		$data=SanPham::select('id','IdLoai','IdNsx','TenSanPham','GiaBan','Mota','NgayCapNhap','HinhAnh','SoLuong','Vip')->orderBy('id','DESC')->get()->toArray();
		return view('admin.product.list',compact('data'));
	}

	public function getAdd()
	{
		$idLoai=LoaiSanPham::select('id','TenLoai')->get()->toArray();
		$idNSX=NhaSanXuat::select('id','TenNhaSanXuat','DiaChi','SDT')->get()->toArray();
		return view('admin.product.add',compact('idLoai','idNSX'));
	}
	public function postAdd(SanPhamRequest $request)
	{
    	//lay hinh
		$file_name=$request->file('fImages')->getClientOriginalName();

		$sanPham=new SanPham();
		$sanPham->IdLoai=$request->checkLoai;
		$sanPham->IdNsx=$request->checkNsx;
		$sanPham->TenSanPham=$request->txtTenSanPham;
		$sanPham->GiaBan=$request->txtGiaBan;
		$sanPham->Mota=$request->txtMoTa;

    	//$lastupdated = date('Y-m-d H:i:s');
		$sanPham->NgayCapNhap=$request->txtDate;

		$sanPham->HinhAnh=$file_name;
		$sanPham->SoLuong=$request->txtSoLuong;
		$sanPham->Vip=0;

		$request->file('fImages')->move('resources/upload/',$file_name);
		$sanPham->save();
    	// print_r($request ->txtTenLoai);
		return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Thêm sản phẩm thành công !!!']);
	}

	public function getEdit($id)
	{
		$idLoai=LoaiSanPham::select('id','TenLoai')->get()->toArray();
		$idNSX=NhaSanXuat::select('id','TenNhaSanXuat')->get()->toArray();
		$data=SanPham::find($id);
		return view('admin.product.edit',compact('idLoai','idNSX','data','id'));
		//return view('admin.product.edit');
	}
	// su dung Request mac dinh 
	public function postEdit($id,Request $request)
	{

		$sanPham=SanPham::find($id);
		$img_current='resources/upload/'.$request->input('img_current');
    	//print_r($loai);
    	// $file_name=$request->file('fImages')->getClientOriginalName();
    	$sanPham->IdLoai=$request->input('checkLoai'); //$request->checkLoai;
    	$sanPham->IdNsx=$request->input('checkNsx');//$request->checkNsx;
    	$sanPham->TenSanPham=$request->input('txtTenSanPham');//$request->txtTenSanPham;
    	$sanPham->GiaBan=$request->input('txtGiaBan');//$request->txtGiaBan;
    	$sanPham->Mota=$request->input('txtMoTa');//$request->txtMoTa;

    	//$lastupdated = date('Y-m-d H:i:s');
    	$sanPham->NgayCapNhap=$request->input('txtDate');//$request->txtDate;
    	if(!empty($request->file('fImages')))
		{
    		// echo "có file";
    		$file_name=$request->file('fImages')->getClientOriginalName();//$request->file('fImages')->getClientOriginalName();
    		$sanPham->HinhAnh=$file_name;
    		$request->file('fImages')->move('resources/upload/',$file_name);
    		if(File::exists($img_current))
    		{
    			File::delete($img_current);
    		}
    	}else
    	{
    		echo "không có file";
    	}
    	
    	$sanPham->SoLuong=$request->input('txtSoLuong');//$request->txtSoLuong;
        $sanPham->Vip=$request->rdoLevel;

    	$sanPham->save();
    	return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Chỉnh sửa sản phẩm thành công !!!']);

    }

    public function getDelete($id)
    {
		//echo $id;
    	$sanPham = SanPham::find($id);
    	$sanPham->delete($id);
    	return redirect()->route('admin.product.list')->with(['flash_level'=>'success','flash_message'=>'Đã xóa thành côngsản phẩm!!!']);
    }
}
