<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLopHocsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lophoc', function (Blueprint $table) {
            $table->id();
            $table->string('tenlop');
            $table->string('chude');
            $table->string('hinh');
            $table->string('code');
            $table->string('token');
            $table->string('ID_TaiKhoan');
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
        Schema::dropIfExists('lop_hocs');
    }
}
