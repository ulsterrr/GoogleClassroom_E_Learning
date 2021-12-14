<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYeuCauLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yeu_cau_lop_hocs', function (Blueprint $table) {
            $table->id();
            $table->integer('taikhoanid');
            $table->integer('lophocid');
            $table->boolean('trangthai')->default(0);
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
        Schema::dropIfExists('yeu_cau_lop_hocs');
    }
}
