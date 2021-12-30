<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\YeuCauLopHoc;

class GianhaplopController extends Controller
{
    function  gianhaplop(Request $req){
        $lophoc=LopHoc::where('code',$req->classcode)->first();
        //dd($lophoc);
        if(!empty($lophoc)){
            $kiemtragianhap=YeuCauLopHoc::where([['taikhoanid',auth()->user()->id] , ['lophocid',$lophoc->id ] ])->first();
            if(empty($kiemtragianhap)){
                $gianhap= new YeuCauLopHoc;
                $gianhap->taikhoanid=auth()->user()->id;
                $gianhap->lophocid=$lophoc->id;
                $gianhap->trangthai=1;
                $gianhap->save();
                return redirect()->route("hoc-sinh");
            }
            return "Đã tham gia";
        }
        return "Lớp học không tồn tại";
    }
}
