<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class NhaSanXuat extends Model
{
    protected $table='NhaSanXuat';
    protected $fillable=['TenNhaSanXuat','DiaChi','SDT'];
    public $timestamps=true;

    public function sanPham()
    {
    	return $this->hasMany('App/SanPham');
    }
}
