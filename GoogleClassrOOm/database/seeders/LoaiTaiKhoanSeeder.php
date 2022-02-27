<?php

namespace Database\Seeders;

use App\Models\LoaiTaiKhoan;
use Illuminate\Database\Seeder;

class LoaiTaiKhoanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taikhoan1 = new LoaiTaiKhoan();
        $taikhoan1->tenloaitk = "Giáo viên";
        $taikhoan1->mota = "Tài khoản với nghiệp vụ là giáo viên";
        $taikhoan1->save();

        $taikhoan = new LoaiTaiKhoan();
        $taikhoan->tenloaitk = "Học sinh";
        $taikhoan->mota = "Tài khoản với nghiệp vụ là học sinh tham gia lớp học";
        $taikhoan->save();

        $taikhoan = new LoaiTaiKhoan();
        $taikhoan->tenloaitk = "Administrator";
        $taikhoan->mota = "Tài khoản với nghiệp vụ là quản lí hệ thống E-learning";
        $taikhoan->save();
    }
}
