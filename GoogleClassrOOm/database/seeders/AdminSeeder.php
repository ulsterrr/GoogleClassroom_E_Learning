<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taikhoan = new TaiKhoan;
        $taikhoan->username = "admin";
        $taikhoan->password = Hash::make('admin');
        $taikhoan->hoten = "Administrator";
        $taikhoan->email = "admin@elearning.com";
        $taikhoan->token = "";
        $taikhoan->sdt = "0123456789";
        $taikhoan->hinhdaidien = "admin.jpg";
        $taikhoan->maloaitk = 3;
        $taikhoan->hoatdong = 1;
        $taikhoan->save();

    }
}
