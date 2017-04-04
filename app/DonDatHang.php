<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DonDatHang extends Model
{
    protected $table='DonDatHang';
    protected $fillable=['NgayDat','NgayGiao','DaThanhToan','TinhTrangGiao'];
    public $timestamps=true;

    public function chiTietDonDatHang()
    {
        return $this->hasMany('App/ChiTietDonDatHang');
    }
    public function khachHang()
    {
    	return $this->belongTo('App/KhachHang');
    }
}
