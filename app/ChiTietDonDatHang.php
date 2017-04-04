<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ChiTietDonDatHang extends Model
{
    protected $table='ChiTietDonDatHang';
    protected $fillable=['IdDonDatHang','IdSanPham','SoLuong','GiaBan','ThanhTien'];
    public $timestamps=true;
    
    public function sanPham()
    {
    	return $this->belongTo('App/SanPham');
    }
    public function donDatHang()
    {
    	return $this->belongTo('App/DonDatHang');
    }
}
