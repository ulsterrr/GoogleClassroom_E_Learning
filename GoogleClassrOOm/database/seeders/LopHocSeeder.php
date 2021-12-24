<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LopHoc;
use Illuminate\Support\Str;

class LopHocSeeder extends Seeder
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
            $taikhoan = new LopHoc;
            $taikhoan->tenlop = "Lớp học {$i}";
            $taikhoan->chude = "Chủ đề {$i}";
            $taikhoan->hinh = "background{$i}.jpg";
            $taikhoan->ID_TaiKhoan = 1;
            $taikhoan->token = "";
            $taikhoan->code = Str::random(6);
            $taikhoan->save();
        }
    }
}
