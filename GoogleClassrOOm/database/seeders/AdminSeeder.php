<?php

namespace Database\Seeders;

use App\Models\LoaiTaiKhoan;
use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;
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

            $random= rand(1, 2);
            $taikhoan = new TaiKhoan;
            $taikhoan->username = "admin";
            $taikhoan->password = Hash::make('12345678');
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
