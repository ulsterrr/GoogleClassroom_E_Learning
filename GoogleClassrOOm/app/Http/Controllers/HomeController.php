<?php

namespace App\Http\Controllers;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    function suaTK(){
        return view('cap-nhat-tai-khoan');
    }
    function editTK(Request $req){
        $taikhoan=TaiKhoan::find(auth()->user()->id);
        $upImage = $req->image;
        $name = $req->file('image')->getClientOriginalName();
 
        $req->file('image')->storeAs('images', $name);
        if(!empty($req->username)){
            $taikhoan->username = $req->username;
        }
        if(!empty($req->password)){
            $taikhoan->password =Hash::make($req->password);
        }
        if(!empty($req->hoten)){
            $taikhoan->hoten =$req->hoten;
        }
        if(!empty($req->email)){
            $taikhoan->email =$req->email;
        }
        if(!empty($req->sdt)){
            $taikhoan->sdt =$req->sdt;
        }
        if(!empty($req->image)){
            $taikhoan->hinhdaidien = $name;
        }
        
        $taikhoan->save();
        return redirect()->route("dang-nhap");
    }
}
