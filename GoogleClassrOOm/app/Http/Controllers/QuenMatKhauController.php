<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class QuenMatKhauController extends Controller
{
    function quenMatKhau(Request $req){
        $taiKhoan = TaiKhoan::where('sdt',$req->Phone)->orWhere('email',$req->Phone)->first();
        
        if(!empty($taiKhoan)){
            $taiKhoan->password=Hash::make($req->newpass);
        }
        $taiKhoan->save();
        return redirect()->route("dang-nhap");
    }
}
