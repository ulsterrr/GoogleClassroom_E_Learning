<?php

namespace Database\Seeders;

use App\Models\LoaiTaiKhoan;
use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Hash;
class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1;$i<=20;$i++)
        {
            $random= rand(1, 2);
            $taikhoan = new TaiKhoan;
            $taikhoan->username = "taikhoan{$i}";
            $taikhoan->password = Hash::make('12345678');
            $taikhoan->hoten = "Tài Khoản {$i}";
            $taikhoan->email = "email{$i}@gmail.com";
            $taikhoan->token = "";
            $taikhoan->sdt = "01234567{$i}";
            $taikhoan->hinhdaidien = "unnamed.png";
            $taikhoan->maloaitk = $random;
            $taikhoan->hoatdong = 1;
            $taikhoan->save();
        }
    
    }
}
