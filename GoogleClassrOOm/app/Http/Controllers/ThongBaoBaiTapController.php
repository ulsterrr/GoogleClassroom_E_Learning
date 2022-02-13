<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\LopHocThongBao;
class ThongBaoBaiTapController extends Controller
{
    function getBaiTap ($id){
        $baitap= LopHocThongBao::where([['lophocid',$id],['chude','Bài tập']])->get();
       return view("bai-tap",compact('baitap'));
    }
}
