<?php

namespace Database\Seeders;

use App\Models\LoaiTaiKhoan;
use Illuminate\Database\Seeder;
use App\Models\TaiKhoan;

class TaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dsLoaiTK = LoaiTaiKhoan::all();
        foreach($dsLoaiTK as $loaiTK){
        for($i=1;$i<=10;$i++)
        {
            $taikhoan = new TaiKhoan;
            $taikhoan->taikhoan = "taikhoan{$i}";
            $taikhoan->matkhau = "taikhoanmoi";
            $taikhoan->hoten = "Tài Khoản {$i}";
            $taikhoan->email = "email{$i}@caothang.edu.vn";
            $taikhoan->sdt = "12345678{$i}";
            $taikhoan->hinhdaidien = "taikhoan{$i}.jpg";
            $taikhoan->maloaitk = $loaiTK->id;
            $taikhoan->save();
        }
    }
    }
}
