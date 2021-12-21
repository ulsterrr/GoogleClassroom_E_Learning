<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class QuenMatKhauController extends Controller
{
    function quenMatKhau(Request $req){
        $taiKhoan = TaiKhoan::where('sdt',$req->Phone)->first();
        
        if(!empty($taiKhoan)){
            $taiKhoan->matkhau=$req->newpass;
        }
        $taiKhoan->save();
        return redirect()->route("dang-nhap");
    }
}
