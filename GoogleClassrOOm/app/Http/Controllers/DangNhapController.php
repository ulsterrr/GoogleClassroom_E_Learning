<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TaiKhoan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DangNhapController extends Controller
{
    public function dangNhap(){
        return view('dang-nhap');
    }

    public function xulyDangNhap(Request $req){

        /*$taikhoan = TaiKhoan::where('taikhoan', $req->ten_tai_khoan)->first();
        
        if(empty($taikhoan)) {
            echo "Not user";
        }
        else if ($taikhoan->matkhau != $req->mat_khau){
            echo "Sai mat khau";
        }
        else if ($taikhoan->maloaitk == 1) {
            return redirect()->route('giang-vien')->with(compact('taikhoan'));
        }
        else {
            return redirect()->route('hoc-sinh')->with(compact('taikhoan'));
        }*/
        $credentials = $req->only('username', 'password');
        if (Auth::attempt($credentials)) {
            // Chứng thực thành công
            $taikhoan = TaiKhoan::where('username', $req->username)->first();
        
            if(empty($taikhoan)) {
            echo "Not user";
            }
            else if ($taikhoan->matkhau != $req->mat_khau){
            echo "Sai mat khau";
            }
            else if ($taikhoan->maloaitk == 1) {
            return redirect()->route('giang-vien')->with(compact('taikhoan'));
            }
            else {
            return redirect()->route('hoc-sinh')->with(compact('taikhoan'));
            }
        } else {
            echo "not";
        }

    }

    public function quenMK(){

    }

    public function dangXuat(){
        Auth::logout();
        return redirect()->route('dang-nhap');
    }
}
