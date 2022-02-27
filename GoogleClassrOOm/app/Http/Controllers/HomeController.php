<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\LopHocThongBao;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function suaTK()
    {
        return view('cap-nhat-tai-khoan');
    }
    public function editTK(Request $req)
    {
        if ($req->hasFile('image')) {
            $taikhoan = TaiKhoan::find(auth()->user()->id);
            if ($req->file('image')->getClientOriginalName() != null) {
                $name = $req->file('image')->getClientOriginalName();
            }
            if ($name != null) {
                $req->file('image')->storeAs('images', $name);
            }

            if (!empty($req->username)) {
                $taikhoan->username = $req->username;
            }
            if (!empty($req->password)) {
                $taikhoan->password = Hash::make($req->password);
            }
            if (!empty($req->hoten)) {
                $taikhoan->hoten = $req->hoten;
            }
            if (!empty($req->email)) {
                $taikhoan->email = $req->email;
            }
            if (!empty($req->sdt)) {
                $taikhoan->sdt = $req->sdt;
            }
            if (!empty($req->image)) {
                $taikhoan->hinhdaidien = $req->file('image')->getClientOriginalName();
            }

            $taikhoan->save();
            Auth::logout();
            return redirect()->route("dang-nhap");
        } else {
            $taikhoan = TaiKhoan::find(auth()->user()->id);

            if (!empty($req->username)) {
                $taikhoan->username = $req->username;
            }
            if (!empty($req->password)) {
                $taikhoan->password = Hash::make($req->password);
            }
            if (!empty($req->hoten)) {
                $taikhoan->hoten = $req->hoten;
            }
            if (!empty($req->email)) {
                $taikhoan->email = $req->email;
            }
            if (!empty($req->sdt)) {
                $taikhoan->sdt = $req->sdt;
            }
            $taikhoan->save();
            Auth::logout();
            return redirect()->route("dang-nhap");
        }
    }
    public function vaoLop($id)
    {
        $layInfoLop = LopHoc::find($id);
        $baidang = LopHocThongBao::where('lophocid', $id)->get();
        return view("lop-hoc", compact("layInfoLop", "baidang"));
    }
}
