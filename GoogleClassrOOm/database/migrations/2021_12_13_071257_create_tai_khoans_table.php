<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTaiKhoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taikhoan', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('hoten');
            $table->string('email');
            $table->string('sdt');
            $table->date('ngaysinh');
            $table->integer('gioitinh')->default(0);
            $table->string('hinhdaidien');
            $table->string('token');
            $table->integer('maloaitk');
            $table->boolean('hoatdong')->default(0);
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
        Schema::dropIfExists('tai_khoans');
    }
}
