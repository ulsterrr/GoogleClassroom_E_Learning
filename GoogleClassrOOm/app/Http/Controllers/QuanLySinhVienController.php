<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLySinhVienController extends Controller
{
    function LayDSsinhvien(){
        $dsSinhVien = SinhVien::all();
        return view('danh-sach-sinh-vien', compact('dsSinhVien'));
    }
    function formThemMoi()
    {
        return view('them-moi-sinh-vien');
    }
    function ThemMoi (Request $req){
        $sinhvien = new SinhVien;

        $sinhvien->ho_ten = $req->ho_ten;
        $sinhvien->ten_dang_nhap = $req->ten_dang_nhap;
        $sinhvien->mat_khau = $req->mat_khau;
        $sinhvien->email = $req->email;

        $sinhvien->save();

        return redirect()->route('dsSinhVien');
    }
public function XoaSinhVien(){
    $sinhvien = SinhVien::find($id);
    if($sinhvien == null)
 {
	return "Không tìm thấy sinh viên có id = {$id}";
 }
 $sinhvien->delete();
 return redirect()->route('dsLop');
}

public function CapNhapSinhVien(Request $req, $id){
   
    if ($sinhvien == null)
{
    return "Không tìm thấy sinh viên có id = {$id}";
	
}
$sinhvien->ho_ten = $req->ho_ten;
$sinhvien->email = $req->email;

$sinhvien->save();
return redirect()->route('dsLop');

}


}