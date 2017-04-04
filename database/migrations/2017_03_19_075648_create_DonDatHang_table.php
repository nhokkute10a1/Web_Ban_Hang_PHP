<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDonDatHangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('DonDatHang', function (Blueprint $table) {
            $table->increments('id');
            $table->dateTime('NgayDat');
            $table->dateTime('NgayGiao');
            $table->tinyInteger('DaThanhToan')->default(0);
            $table->tinyInteger('TinhTrangGiao')->default(0);

            $table->integer('IdUser')->unsigned();
            $table->foreign('IdUser')->references('id')->on('users')->onDelete('cascade');
            
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
        Schema::dropIfExists('DonDatHang');
    }
}
