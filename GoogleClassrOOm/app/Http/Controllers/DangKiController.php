<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;

class DangKiController extends Controller
{
    function dangKi(Request $req){
       $taiKhoan = new TaiKhoan;
       $taiKhoan->taikhoan=$req->Username;
       $taiKhoan->matkhau=$req->password;
       $taiKhoan->hoten=$req->Fullname;
       $taiKhoan->email=$req->email;
       $taiKhoan->sdt=$req->Phone;
       $taiKhoan->hinhdaidien="";
       $taiKhoan->maloaitk=2;
       $taiKhoan->hoatdong=0;
       $taiKhoan->save();
       return View("dang-nhap");
    }

}
