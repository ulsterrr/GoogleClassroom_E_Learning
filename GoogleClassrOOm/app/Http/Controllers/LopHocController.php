<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\LopHocThongBao;

class LopHocController extends Controller
{
    function detailClass($id){
        $class=LopHoc::find($id);
        return view('chi-tiet-lop-hoc',compact('class'));
    }
    function danhSachSinhVien($id){
        //dd($id);
        $lophoc=LopHoc::find($id);
        return view('danh-sach-sinhvien-class',compact('lophoc'));
    }
    function themBaiDang(Request $request,$id){
        $baidang= new LopHocThongBao;
        $baidang->tieude=$request->tieude;
        $baidang->chude=$request->chude;
        $baidang->noidung=$request->noidung;
        $baidang->thoihan=$request->deadline;
        $baidang->thoigian="";
        $baidang->file="";
        $baidang->lophocid=$id;
        $baidang->save();
        return back();
    }
}
