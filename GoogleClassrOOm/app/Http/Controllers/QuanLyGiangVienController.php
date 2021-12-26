<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QuanLyGiangVienController extends Controller
{
    function LayDSgiangvien(){
        $dsGiangVien = GiangVien::all();
        return view('danh-sach-giang-vien', compact('dsGiangVien'));
    }
    function formThemMoi()
    {
        return view('them-moi-giang-vien');
    }
    function ThemMoi (Request $req){
        $giangvien = new GiangVien;

        $giangvien->ho_ten = $req->ho_ten;
        $giangvien->ten_dang_nhap = $req->ten_dang_nhap;
        $giangvien->mat_khau = $req->mat_khau;
        $giangvien->email = $req->email;

        $giangvien->save();

        return redirect()->route('dsGiangVien');
    }
public function XoaGiangVien(){
    $giangvien = GiangVien::find($id);
    if($giangvien == null)
 {
	return "Không tìm thấy giảng viên có id = {$id}";
 }
 $giangvien->delete();
 return redirect()->route('dsLop');
}

public function CapNhapGiangVien(Request $req, $id){
   
    if ($giangvien == null)
{
    return "Không tìm thấy giảng viên có id = {$id}";
	
}
$giangvien->ho_ten = $req->ho_ten;
$giangvien->email = $req->email;

$giangvien->save();
return redirect()->route('dsLop');

}


}