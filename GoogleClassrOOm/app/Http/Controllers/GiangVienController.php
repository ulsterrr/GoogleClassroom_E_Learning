<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\TaiKhoan;
use App\Models\YeuCauLopHoc;
use App\Models\LopHocThongBao;
use App\Models\LopHocBaiTap;
use App\Models\LopHocBinhLuan;


class GiangVienController extends Controller
{
    public function thongTinTK(){
        
    }
    public function dsLopHoc(){
        $dsLop = LopHoc::where('ID_TaiKhoan',auth()->user()->id)->get();

        return view('giang-vien', compact('dsLop'));
    }

}
