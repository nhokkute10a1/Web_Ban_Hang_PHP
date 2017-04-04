<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SanPham extends Model
{
    protected $table='SanPham';
    protected $fillable=['IdLoai','IdNsx','TenSanPham','GiaBan','MoTa','NgayCapNhap','SoLuong','GioiTinh'];
    public $timestamps=true;
    //thuoc cai j do
    public function loaiSanPham()
    {
    	return $this->belongTo('App/LoaiSanPham');
    }
    public function nhaSanXuat()
    {
    	return $this->belongTo('App/NhaSanXuat');
    }
    public function chiTietDonDatHang()
    {
        return $this->hasMany('App/ChiTietDonDatHang');
    }
}
