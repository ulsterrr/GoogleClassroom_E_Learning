<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocThongBaosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophocthongbao', function (Blueprint $table) {
            $table->id();
            $table->string('tieude');
            $table->string('chude');
            $table->string('noidung');
            $table->string('file')->nullable();
            $table->dateTime('thoihan');
            $table->integer('lophocid');
            $table->integer('taikhoanid');
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
        Schema::dropIfExists('lop_hoc_thong_baos');
    }
}
