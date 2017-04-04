<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class LoaiSanPham extends Model
{
    protected $table='LoaiSanPham';
    protected $fillable=['TenLoai'];
    public $timestamps=true;
    
    public function sanPham()
    {
    	// app/class
    	return $this->hasMany('App/SanPham');
    }
}
