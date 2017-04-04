<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSanPhamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('SanPham', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('IdLoai')->unsigned();
            $table->foreign('IdLoai')->references('id')->on('LoaiSanPham')->onDelete('cascade');

            $table->integer('IdNsx')->unsigned();
            $table->foreign('IdNsx')->references('id')->on('NhaSanXuat')->onDelete('cascade');

            $table->string('TenSanPham');
            $table->decimal('GiaBan',18,3);
            $table->text('Mota');
            $table->dateTime('NgayCapNhap');
            $table->string('HinhAnh');
            $table->integer('SoLuong')->default(0);
            $table->integer('Vip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('SanPham');
    }
}
