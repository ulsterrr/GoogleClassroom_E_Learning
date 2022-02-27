<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class QuenMatKhauController extends Controller
{
    public function quenMatKhau(Request $req)
    {
        $taiKhoan = TaiKhoan::where('sdt', $req->Phone)->orWhere('email', $req->Phone)->first();

        if (!empty($taiKhoan)) {
            $taiKhoan->password = Hash::make($req->newpass);
        }
        $taiKhoan->save();
        return redirect()->route("dang-nhap");
    }
}
