<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    protected $table='KhachHang';
    
    public $timestamps=true;
    
    protected $hidden = [
        'MatKhau', 'remember_token',
    ];
    public function donDatHang()
    {
        return $this->hasMany('App/DonDatHang');
    }
    public function vaiTroNgDung()
    {
        return $this->hasMany('App/VaiTroNgDung');
    }
}