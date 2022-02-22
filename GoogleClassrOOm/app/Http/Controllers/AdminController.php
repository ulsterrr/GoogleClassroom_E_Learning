<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Rules\MatchOldPassword;
use Illuminate\Support\Facades\Hash;
use App\Models\TaiKhoan;
use App\Models\LopHoc;
use App\Models\LoaiTaiKhoan;
class AdminController extends Controller
{

    public function dsAdmin()
    {
        $ad = TaiKhoan::whereHas('loaitaikhoan', function($q){
            $q->where('maloaitk', '3');
        })->get();

        return view('pages.admin.user.giangvien.admin-ds-admin', compact('ad'));
    }
    public function editAdmin($id, Request $request)
    {

            $this->validate($request,[
                'name' => 'required',
                'email' => 'email|required',
                'username' => 'required',
            ]);

            $user = Auth::user();
            $user->hoten = $request->name;
            $user->username = $request->username;
            $user->email = $request->email;

            $user->save();

            $request->session()->flash('message.profile', 'Thay đổi thông tin thành công!');

            return redirect()->back();


    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function thayDoiMK($id, Request $request)
    {       
        TaiKhoan::find(auth()->user()->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Mật khẩu đã được cập nhật!');

        return redirect()->back();
    }

    public function taoLopHocIndex()
    {
        $user = Auth::user();
    	return view('pages.admin.lophoc.admin-tao-lophoc', compact('user', $user));
    }

    public function taoLopHoc(Request $request)
    {

        $lopHoc = new LopHoc;
        $lopHoc->tenlop=$request->classname;
        $lopHoc->chude=$request->subject;
        $lopHoc->hinh = $request->radioname;
        $lopHoc->token = "";
        $lopHoc->code= Str::random(6);
        $lopHoc->ID_TaiKhoan = auth()->user()->id;
        $lopHoc->save();

        return back()->with('success','Tạo lớp thành công!');
    }


    public function dsLopHoc(Request $request)
    {
        $lophoc = LopHoc::get();
        return view('pages.admin.lophoc.admin-ds-lophoc', compact('lophoc'));
    }


    public function timKiemLopHoc(Request $request)
	{
        $user = Auth::user();

		$key = $request->table_search;


        $key = LopHoc::where('tenlop','like',"%".$key."%")
                            ->orWhere('chude','like',"%".$key."%")
                            ->get();


		return view('pages.admin.lophoc.admin-find-lophoc', compact('key', 'user') );

    }

    public function suaLopHocIndex($id)
    {
        $user = Auth::user();
        $lophoc = LopHoc::findOrFail($id);
        return view('pages.admin.lophoc.admin-sua-lophoc', compact('user', 'lophoc',));
    }


    public function capNhatLopHoc(Request $request, $id)
    {
        $this->validate($request,[
            'tenlop' => 'required',
            'chude' => 'required'
        ]);

        $lophoc = LopHoc::findOrFail($id);
        $lophoc->tenlop = $request->tenlop;
        $lophoc->chude = $request->chude;
        $lophoc->save();

        return back()->with('success','Lớp học đã được cập nhật.');
    }


    public function xoaLopHoc($id)
    {
        $user = Auth::user();
        $lophoc = LopHoc::findOrFail($id);
        $lophoc->delete();
        return redirect()->back()->with('success', 'Xóa lớp thành công.');
    }


    
    public function dsGiangVien()
    {
        $user = Auth::user();

        $gv = TaiKhoan::whereHas('loaitaikhoan', function($q){
            $q->where('maloaitk', '1');
        })->get();

        return view('pages.admin.user.giangvien.admin-ds-giangvien', compact('user', 'gv',));
    }


    public function timKiemGiangVien(Request $request)
	{
        $user = Auth::user();


		$key = $request->table_search;


        $search = TaiKhoan::whereHas('loaitaikhoan', function($q){
            $q->where('maloaitk', '1');
        })->where('hoten','like',"%".$key."%")
        ->orWhere('username','like',"%".$key."%")
        ->get();



		return view('pages.okemin.user.teacher.admin-find-giangvien', compact('key', 'user') );

    }


    public function xoaGiangVien($id)
    {
        $user = Auth::user();
        $teacher = User::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'User Berhasil diHapus.');
    }

    public function capNhatAvtGiangVien($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $teacher = TaiKhoan::findOrFail($id);

        $avatarName = $teacher->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $teacher->hinhdaidien = $avatarName;
        $teacher->save();

        return back()
            ->with('success','Cập nhật thành công.');
    }


    public function thongTinGiangVien($id)
    {
        $user = Auth::user();
    	$teacher = TaiKhoan::findOrFail($id);
    	return view('pages.admin.user.giangvien.hoso.trang-ca-nhan', compact('user', 'teacher',));
    }

    public function avtGiangVien($id)
    {
        $user = Auth::user();
        $gv = TaiKhoan::findOrFail($id);
        return view('pages.admin.user.giangvien.hoso.avt', compact('user', 'gv' ,));
    }

    public function suaHoSoGiangVien($id, Request $request)
    {

            $gv = TaiKhoan::findOrFail($id);
            $gv->hoten = $request->name;
            $gv->sdt = $request->phone;
            $gv->ngaysinh = $request->bird;
            $gv->maloaitk = $request->role;
            $gv->email = $request->email;
            $gv->save();


            $request->session()->flash('message.profile', 'Sửa thành công!');

            return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doiMKGiangVien($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $teacher = TaiKhoan::findOrFail($id);
        TaiKhoan::find($teacher->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Đổi mật khẩu thành công!');

        return redirect()->back();
    }


    public function dsHocVien()
    {
        $user = Auth::user();

        $st = TaiKhoan::whereHas('maloaitk', function($q){
            $q->where('name', '2');
        })->get();

        return view('pages.admin.user.hocvien.admin-ds-hocvien', compact('user', 'st',));
    }

    public function timKiemHocVien(Request $request)
	{
        $user = Auth::user();


		$search = $request->table_search;


        $search = TaiKhoan::whereHas('loaitaikhoan', function($q){
            $q->where('maloaitk', '2');
        })->where('hoten','like',"%".$search."%")
        ->orWhere('sdt','like',"%".$search."%")
        ->orWhere('username','like',"%".$search."%")
        ->get();

		return view('pages.admin.user.hocvien.admin-find-hocvien', compact('search', 'user') );
    }

    
    public function xoaHocVien($id)
    {
        $user = Auth::user();
        $student = TaiKhoan::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Xóa học viên thành công.');
    }


    public function loadAvtHocVien($id)
    {
        $user = Auth::user();
        $student = TaiKhoan::findOrFail($id);
        return view('pages.admin.user.hocvien.hoso.avt', compact('user', 'student',));
    }

    public function doiAvtHocVien($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $student = TaiKhoan::findOrFail($id);

        $avatarName = $student->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $student->avatar = $avatarName;
        $student->save();

        return back()
            ->with('success','Đổi hình đại diện thành công.');
    }


    public function thongTinHocVien($id)
    {
        $user = Auth::user();
        $student = TaiKhoan::findOrFail($id);
        $lophoc = LopHoc::all();
    	return view('pages.admin.user.hocvien.hoso.trang-ca-nhan', compact('user', 'student', 'lophoc'));
    }

    public function suaHoSoHocVien($id, Request $request)
    {

        $this->validate($request,[
            'hoten' => 'required',
            'username' => 'required',
            'email' => 'email',
            'sdt' => 'required',
        ]);

        $student = TaiKhoan::findOrFail($id);
        $student->hoten = $request->name;
        $student->maloaitk = $request->maloaitk;
        $student->hoatdong = $request->hoatdong;
        $student->email = $request->email;
        $student->sdt = $request->sdt;
        $student->save();


        $request->session()->flash('message.profile', 'Thay đổi thông tin thành công!');

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function doiMKHocVien($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $student = TaiKhoan::findOrFail($id);
        TaiKhoan::find($student->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Mật khẩu đã được thay đổi!');

        return redirect()->back();
    }

    public function taoGiangVienIndex()
    {
        $user = Auth::user();
    	return view('pages.admin.user.giangvien.admin-tao-gv');
    }

    public function taoGiangVien(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            "password" => 'required',
            "hoten" => 'required',
            "sdt" => 'required',
            "email" => 'required|unique:users',
        ]);
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username=$request->Username;
        $taiKhoan->password=Hash::make($request->password);
        $taiKhoan->hoten=$request->Fullname;
        $taiKhoan->email=$request->email;
        $taiKhoan->sdt=$request->Phone;
        $taiKhoan->hinhdaidien="unnamed.png";
        $taiKhoan->token="";
        $taiKhoan->maloaitk=2;
        $taiKhoan->hoatdong=1;
        $taiKhoan->save();
            
        return back()->with('success','Đã thêm mới giảng viên!');
    }

    // Teacher
    public function taoHocVienIndex()
    {
        $user = Auth::user();
        $lophoc = LopHoc::all();
    	return view('pages.admin.user.hocvien.admin-tao-hs', compact('user', 'lophoc'));
    }

    public function taoHocVien(Request $request)
    {
        $this->validate($request,[
            'username' => 'required',
            "password" => 'required',
            "hoten" => 'required',
            "sdt" => 'required',
            "email" => 'required|unique:users',
        ]);
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username=$request->Username;
        $taiKhoan->password=Hash::make($request->password);
        $taiKhoan->hoten=$request->Fullname;
        $taiKhoan->email=$request->email;
        $taiKhoan->sdt=$request->Phone;
        $taiKhoan->hinhdaidien="unnamed.png";
        $taiKhoan->token="";
        $taiKhoan->maloaitk=2;
        $taiKhoan->hoatdong=1;
        $taiKhoan->save();


        return back()->with('success','Đã tạo học viên mới.');
    }

}


