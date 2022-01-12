<?php

namespace App\Http\Controllers;

use Carbon\Carbon;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\LopHocThongBao;
use App\Models\YeuCauLopHoc;
use App\Models\TaiKhoan;
class LopHocController extends Controller
{
    function detailClass($id){
        $class=LopHoc::find($id);
        return view('chi-tiet-lop-hoc',compact('class'));
    }
    function danhSachSinhVien($id){
        //dd($id);
        $lophoc=LopHoc::find($id);
        $dsHocvien=YeuCauLopHoc::where('lophocid',$id)->get();
        return view('danh-sach-cho',compact('lophoc','dsHocvien'));
    }
    function themBaiDang(Request $request,$id){
        $baidang= new LopHocThongBao;
        $baidang->tieude=$request->tieude;
        $baidang->chude=$request->chude;
        $baidang->noidung=$request->noidung;
        $baidang->thoihan = Carbon::parse($request->deadline);
        $baidang->file="";
        $baidang->lophocid=$id;
        $baidang->save();
        return back();
    }
    public function confirmstudent($idtaikhoan,$idlop)
    {
        $confirm=YeuCauLopHoc::where([['lophocid',$idlop],['taikhoanid',$idtaikhoan]])->first();
        $confirm->trangthai=1;
        $confirm->save();
        return back();

    }
    public function deleteStudent($idtaikhoan,$idlop)
    {
        $delete=YeuCauLopHoc::where([['lophocid',$idlop],['taikhoanid',$idtaikhoan]])->first();
        $delete->delete();
        return back();
    }
    public function addstudentbymail(Request $req,$id){
        $add = TaiKhoan::where('email',$req->addmail)->first();
        if(!empty($add)){
            $checkYeucau=YeuCauLopHoc::where([['lophocid',$id],['taikhoanid', $add->id]])->first();
            if(empty($checkYeucau)){
                $yeucau=new YeuCauLopHoc;
                $yeucau ->taikhoanid =  $add->id;
                $yeucau ->lophocid = $id;
                $yeucau ->trangthai=1;
                $yeucau->save();
                return back()->with('success','Thêm thành công');
            }else{
                return back()->with('failed','Đã tham gia');
            }
        }
        return back()->with('error','Mail không tồn tại');
    }
}
