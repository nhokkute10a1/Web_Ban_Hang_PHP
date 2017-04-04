<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateChiTietDonDatHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ChiTietDonDatHang', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('IdDonDatHang')->unsigned();
            $table->foreign('IdDonDatHang')->references('id')->on('DonDatHang')->onDelete('cascade');

            $table->integer('IdSanPham')->unsigned();
            $table->foreign('IdSanPham')->references('id')->on('SanPham')->onDelete('cascade');

            $table->integer('SoLuong')->default(0);
            $table->decimal('GiaBan',18,3);
            $table->decimal('ThanhTien',18,3);
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
        Schema::dropIfExists('ChiTietDonDatHang');
    }
}
