<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use App\Models\TaiKhoan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * Show the application dashboard.
 *
 * @return \Illuminate\Contracts\Support\Renderable
 */
class AdminController extends Controller
{
    public function dashAdmin()
    {
        $tk = TaiKhoan::all()->count();
        $ad = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '3');
        })->count();
        $gv = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '1');
        })->count();
        $hs = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '2');
        })->count();

        $l = LopHoc::all()->count();
        $hd = TaiKhoan::where('hoatdong', '=' ,'0')->count();
        $khd = TaiKhoan::where('hoatdong', '=' ,'1')->count();
        $k = TaiKhoan::where('hoatdong', '=' ,'2')->count();
        return view('quan-tri-vien', compact('tk', 'ad', 'hs', 'gv', 'l','hd', 'khd', 'k'));
    }

    public function dsAdmin()
    {
        $ad = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '3');
        })->get();

        return view('pages.admin.admin-ds-admin', compact('ad'));
    }
    public function editAdmin(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email|required',
        ]);

        $user = Auth::user();
        $user->hoten = $request->name;
        $user->username = $request->username;
        $user->email = $request->email;
        $user->sdt = $request->sdt;
        $user->gioitinh = $request->gioitinh;
        $user->ngaysinh = $request->bird;
        $user->hoatdong = $request->hoatdong;
        $user->save();

        $request->session()->flash('message.profile', 'Thay đổi thông tin thành công!');

        return redirect()->back();

    }

    public function capNhatAvtAdmin(Request $request)
    {

        $ad = Auth::user();

        $avatarName = $ad->id . '_avatar' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();

        $request->file('avatar')->storeAs('images', $avatarName);

        $ad->hinhdaidien = $avatarName;
        $ad->save();

        return back()
            ->with('success', 'Cập hình đại diện nhật thành công!');
    }

    public function timKiemAdmin(Request $request)
    {
        $user = Auth::user();

        $key = $request->table_search;

        $searchs = TaiKhoan::where(function ($query) {
            $query->where('maloaitk', '=', 3);
        })->where(function ($query) use ($key) {
            $query->where('hoten', 'like', "%" . $key . "%")
                ->orWhere('sdt', 'like', "%" . $key . "%")
                ->orWhere('username', 'like', "%" . $key . "%")
                ->orWhere('email', 'like', "%" . $key . "%");
        });

        $search = $searchs->get();

        return view('pages.admin.admin-find-ad', compact('key', 'search'));

    }

    public function thayDoiMK(Request $request)
    {
        $request->validate([
            'current_password' => ['required'],
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);

        $taiKhoan = Auth::user();

        if (!empty($taiKhoan)) {
            $taiKhoan->password = Hash::make($request->new_password);
        }
        $taiKhoan->save();

        $request->session()->flash('message.password', 'Mật khẩu đã được cập nhật!');

        return redirect()->back();
    }

    public function taoLopHocIndex()
    {
        $gv = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '1');
        })->get();
        return view('pages.admin.lophoc.admin-tao-lophoc', compact('gv', $gv));
    }

    public function taoLopHoc(Request $request)
    {

        $lopHoc = new LopHoc;
        $lopHoc->tenlop = $request->classname;
        $lopHoc->chude = $request->subject;
        $lopHoc->hinh = $request->radioname;
        $lopHoc->token = "";
        $lopHoc->code = Str::random(6);
        $lopHoc->ID_TaiKhoan = $request->giangvien;
        $lopHoc->save();

        return back()->with('success', 'Tạo lớp thành công!');
    }

    public function dsLopHoc(Request $request)
    {
        $gv = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '1');
        })->get();
        $lophoc = LopHoc::get();
        return view('pages.admin.lophoc.admin-ds-lophoc', compact('lophoc', 'gv'));
    }

    public function timKiemLopHoc(Request $request)
    {
        $user = Auth::user();

        $key = $request->table_search;

        $search = LopHoc::where('code', 'like', "%" . $key . "%")
            ->orWhere('tenlop', 'like', "%" . $key . "%")
            ->orWhere('chude', 'like', "%" . $key . "%")
            ->get();

        return view('pages.admin.lophoc.admin-find-lophoc', compact('key', 'search'));

    }

    public function suaLopHocIndex($id)
    {
        $gv = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '1');
        })->get();
        $lophoc = LopHoc::findOrFail($id);
        return view('pages.admin.lophoc.admin-sua-lophoc', compact('gv', 'lophoc', ));
    }

    public function capNhatLopHoc(Request $request, $id)
    {
        $this->validate($request, [
            'tenlop' => 'required',
            'chude' => 'required',
        ]);

        $lophoc = LopHoc::findOrFail($id);
        $lophoc->tenlop = $request->tenlop;
        $lophoc->chude = $request->chude;
        $lophoc->ID_TaiKhoan = $request->giangvien;
        $lophoc->save();

        return back()->with('success', 'Lớp học đã được cập nhật.');
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

        $gv = TaiKhoan::where(function ($q) {
            $q->where('maloaitk', '1');
        })->get();

        return view('pages.admin.user.giangvien.admin-ds-giangvien', compact('user', 'gv', ));
    }

    public function timKiemGiangVien(Request $request)
    {
        $user = Auth::user();

        $key = $request->table_search;
        //$search = TaiKhoan::where('maloaitk', '1')->get();

        $searchs = TaiKhoan::where(function ($query) {
            $query->where('maloaitk', '=', 1);
        })->where(function ($query) use ($key) {
            $query->where('hoten', 'like', "%" . $key . "%")
                ->orWhere('sdt', 'like', "%" . $key . "%")
                ->orWhere('email', 'like', "%" . $key . "%")
                ->orWhere('username', 'like', "%" . $key . "%");
        });

        $search = $searchs->get();

        return view('pages.admin.user.giangvien.admin-find-giangvien', compact('search', 'key'));

    }

    public function xoaGiangVien($id)
    {
        $user = Auth::user();
        $teacher = TaiKhoan::findOrFail($id);
        $teacher->delete();
        return redirect()->back()->with('success', 'Xóa thành công.');
    }

    public function capNhatAvtGiangVien($id, Request $request)
    {

        $teacher = TaiKhoan::findOrFail($id);

        $avatarName = $teacher->id . '_avatar' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();

        $request->file('avatar')->storeAs('images', $avatarName);

        $teacher->hinhdaidien = $avatarName;
        $teacher->save();

        return back()
            ->with('success', 'Cập hình đại diện nhật thành công!');
    }

    public function thongTinGiangVien($id)
    {
        $user = Auth::user();
        $gv = TaiKhoan::findOrFail($id);
        return view('pages.admin.user.giangvien.hoso.trang-ca-nhan', compact('user', 'gv', ));
    }

    public function suaHoSoGiangVien($id, Request $request)
    {

        $gv = TaiKhoan::findOrFail($id);
        $gv->hoten = $request->name;
        $gv->sdt = $request->sdt;
        $gv->gioitinh = $request->gioitinh;
        $gv->ngaysinh = $request->bird;
        $gv->hoatdong = $request->hoatdong;
        $gv->maloaitk = $request->loaitk;
        $gv->email = $request->email;
        $gv->save();

        $request->session()->flash('message.profile', 'Sửa thành công!');

        return redirect()->back();
    }

    public function doiMKGiangVien($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $teacher = TaiKhoan::findOrFail($id);
        TaiKhoan::find($teacher->id)->update(['password' => Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Đổi mật khẩu thành công!');

        return redirect()->back();
    }

    public function dsHocVien()
    {
        $user = Auth::user();

        $students = TaiKhoan::whereHas('loaitaikhoan', function ($q) {
            $q->where('maloaitk', '2');
        })->get();

        return view('pages.admin.user.hocvien.admin-ds-hocvien', compact('user', 'students', ));
    }

    public function timKiemHocVien(Request $request)
    {
        $user = Auth::user();

        $key = $request->table_search;

        $searchs = TaiKhoan::where(function ($query) {
            $query->where('maloaitk', '=', 1);
        })->where(function ($query) use ($key) {
            $query->where('hoten', 'like', "%" . $key . "%")
                ->orWhere('sdt', 'like', "%" . $key . "%")
                ->orWhere('email', 'like', "%" . $key . "%");
        });

        $search = $searchs->get();
        return view('pages.admin.user.hocvien.admin-find-hocvien', compact('search', 'key'));
    }

    public function xoaHocVien($id)
    {
        $user = Auth::user();
        $student = TaiKhoan::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'Xóa học viên thành công.');
    }

    public function doiAvtHocVien($id, Request $request)
    {

        $student = TaiKhoan::findOrFail($id);

        $avatarName = $student->id . '_avatar' . time() . '.' . $request->file('avatar')->getClientOriginalExtension();

        $request->file('avatar')->storeAs('images', $avatarName);

        $student->hinhdaidien = $avatarName;
        $student->save();

        return back()
            ->with('success', 'Đổi hình đại diện thành công.');
    }

    public function thongTinHocVien($id)
    {
        $user = Auth::user();
        $gv = TaiKhoan::findOrFail($id);
        $lophoc = LopHoc::all();
        return view('pages.admin.user.hocvien.hoso.trang-ca-nhan', compact('user', 'gv', 'lophoc'));
    }

    public function suaHoSoHocVien($id, Request $request)
    {

        $this->validate($request, [
            'hoten' => 'required',
            'username' => 'required',
            'email' => 'email',
            'sdt' => 'required',
        ]);

        $gv = TaiKhoan::findOrFail($id);
        $gv->hoten = $request->name;
        $gv->sdt = $request->sdt;
        $gv->gioitinh = $request->gioitinh;
        $gv->ngaysinh = $request->bird;
        $gv->hoatdong = $request->hoatdong;
        $gv->maloaitk = $request->loaitk;
        $gv->email = $request->email;
        $gv->save();

        $request->session()->flash('message.profile', 'Sửa thành công!');

        return redirect()->back();
    }

    public function doiMKHocVien($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $student = TaiKhoan::findOrFail($id);
        TaiKhoan::find($student->id)->update(['password' => Hash::make($request->new_password)]);

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
        $this->validate($request, [
            'username' => 'required',
            "password" => 'required',
            "hoten" => 'required',
            "sdt" => 'required',
            "email" => 'required|unique:users',
        ]);
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username = $request->Username;
        $taiKhoan->password = Hash::make($request->password);
        $taiKhoan->hoten = $request->Fullname;
        $taiKhoan->email = $request->email;
        $taiKhoan->sdt = $request->Phone;
        $taiKhoan->hinhdaidien = "unnamed.png";
        $taiKhoan->token = "";
        $taiKhoan->maloaitk = 2;
        $taiKhoan->hoatdong = 1;
        $taiKhoan->save();

        return back()->with('success', 'Đã thêm mới giảng viên!');
    }

    public function taoHocVienIndex()
    {
        $user = Auth::user();
        $lophoc = LopHoc::all();
        return view('pages.admin.user.hocvien.admin-tao-hs', compact('user', 'lophoc'));
    }

    public function taoHocVien(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            "password" => 'required',
            "hoten" => 'required',
            "sdt" => 'required',
            "email" => 'required|unique:users',
        ]);
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username = $request->Username;
        $taiKhoan->password = Hash::make($request->password);
        $taiKhoan->hoten = $request->Fullname;
        $taiKhoan->email = $request->email;
        $taiKhoan->sdt = $request->Phone;
        $taiKhoan->hinhdaidien = "unnamed.png";
        $taiKhoan->token = "";
        $taiKhoan->maloaitk = 2;
        $taiKhoan->hoatdong = 1;
        $taiKhoan->save();

        return back()->with('success', 'Đã tạo học viên mới.');
    }

    public function taoAdminIndex()
    {
        $user = Auth::user();
        return view('pages.admin.admin-tao-ad');
    }
    public function taoAdmin(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'new_password' => ['required'],
            'name' => ['required'],
            'confirm_new_password' => ['same:new_password'],
            "email" => 'required|unique:users',
        ]);
        $taiKhoan = new TaiKhoan;
        $taiKhoan->username = $request->username;
        $taiKhoan->password = Hash::make($request->new_password);
        $taiKhoan->hoten = $request->name;
        $taiKhoan->email = $request->email;
        $taiKhoan->sdt = $request->sdt;
        $taiKhoan->ngaysinh = $request->ngaysinh;
        $taiKhoan->hinhdaidien = "unnamed.png";
        $taiKhoan->gioitinh = $request->gioitinh;
        $taiKhoan->token = "";
        $taiKhoan->maloaitk = 3;
        $taiKhoan->hoatdong = $request->hoatdong;
        $taiKhoan->save();

        return back()->with('success', 'Đã thêm mới Admin!');
    }

}
