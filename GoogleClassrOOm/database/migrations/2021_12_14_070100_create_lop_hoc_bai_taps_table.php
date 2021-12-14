<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocBaiTapsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lop_hoc_bai_taps', function (Blueprint $table) {
            $table->id();
            $table->integer('taikhoanid');
            $table->integer('diemso');
            $table->boolean('trangthai')->default(0);
            $table->integer('thongbaoid');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lop_hoc_bai_taps');
    }
}
