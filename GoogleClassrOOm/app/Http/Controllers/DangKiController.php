<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DangKiController extends Controller
{
    public function dangKi(Request $req)
    {
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username = $req->Username;
        $taiKhoan->password = Hash::make($req->password);
        $taiKhoan->hoten = $req->Fullname;
        $taiKhoan->email = $req->email;
        $taiKhoan->sdt = $req->Phone;
        $taiKhoan->hinhdaidien = "unnamed.png";
        $taiKhoan->token = "";
        $taiKhoan->maloaitk = 2;
        $taiKhoan->hoatdong = 0;
        $taiKhoan->save();
        return redirect()->route("dang-nhap");
    }
}
