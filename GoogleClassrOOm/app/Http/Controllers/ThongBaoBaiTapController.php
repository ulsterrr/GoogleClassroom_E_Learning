<?php

namespace App\Http\Controllers;

use App\Models\LopHocThongBao;

class ThongBaoBaiTapController extends Controller
{
    public function getBaiTap($id)
    {
        $baitap = LopHocThongBao::where([['lophocid', $id], ['chude', 'Bài tập']])->get();
        return view("bai-tap", compact('baitap'));
    }
}
