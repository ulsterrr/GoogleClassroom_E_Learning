<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LoaiTaiKhoan;

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

            
    }
}
