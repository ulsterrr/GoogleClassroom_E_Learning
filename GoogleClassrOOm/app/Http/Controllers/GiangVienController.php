<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;

class GiangVienController extends Controller
{
    public function thongTinTK()
    {

    }
    public function dsLopHoc()
    {
        $dsLop = LopHoc::where('ID_TaiKhoan', auth()->user()->id)->get();

        return view('giang-vien', compact('dsLop'));
    }

}
