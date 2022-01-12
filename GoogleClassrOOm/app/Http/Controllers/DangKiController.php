<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class DangKiController extends Controller
{
    function dangKi(Request $req){
       $taiKhoan = new TaiKhoan;
       $taiKhoan->username=$req->Username;
       $taiKhoan->password=Hash::make($req->password);
       $taiKhoan->hoten=$req->Fullname;
       $taiKhoan->email=$req->email;
       $taiKhoan->sdt=$req->Phone;
       $taiKhoan->hinhdaidien="df_account.svg";
       $taiKhoan->token="";
       $taiKhoan->maloaitk=2;
       $taiKhoan->hoatdong=0;
       $taiKhoan->save();
       return redirect()->route("dang-nhap");
    }
}
