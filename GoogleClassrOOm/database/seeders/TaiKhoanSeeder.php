<?php

namespace Database\Seeders;

use App\Models\TaiKhoan;
use Illuminate\Database\Seeder;
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
        for ($i = 1; $i <= 20; $i++) {
            //$random= rand(1, 2);
            $taikhoan = new TaiKhoan;
            $taikhoan->username = "taikhoan{$i}";
            $taikhoan->password = Hash::make('12345678');
            $taikhoan->hoten = "Học viên {$i}";
            $taikhoan->email = "hsmail{$i}@gmail.com";
            $taikhoan->token = "";
            $taikhoan->sdt = "01234567{$i}";
            $taikhoan->hinhdaidien = "unnamed.png";
            $taikhoan->maloaitk = 2;
            $taikhoan->hoatdong = 0;
            $taikhoan->save();
        }
        for ($i = 1; $i <= 20; $i++) {
            //$random= rand(1, 2);
            $taikhoan = new TaiKhoan;
            $taikhoan->username = "taikhoan{$i}";
            $taikhoan->password = Hash::make('12345678');
            $taikhoan->hoten = "Giảng viên {$i}";
            $taikhoan->email = "gvmail{$i}@gmail.com";
            $taikhoan->token = "";
            $taikhoan->sdt = "01234567{$i}";
            $taikhoan->hinhdaidien = "unnamed.png";
            $taikhoan->maloaitk = 1;
            $taikhoan->hoatdong = 0;
            $taikhoan->save();
        }

    }
}
