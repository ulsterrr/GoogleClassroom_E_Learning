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
    //Index method for Admin Controller
    public function index()
    {
        $user = Auth::user();
        return view('pages.admin.home', compact('user', $user));
    }

    public function capNhatAvt(Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $user = Auth::user();

        $avatarName = $user->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $user->avatar = $avatarName;

        $user->save();

        return back()
            ->with('success','Cập nhật thành công.');
    }

    public function editProfile($id, Request $request)
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
    public function EditPassword($id, Request $request)
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
                            ->orWhere('mota','like',"%".$key."%")
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

        $gv = TaiKhoan::whereHas('maloaitk', function($q){
            $q->where('name', '1');
        })->get();

        return view('pages.admin.user.giangvien.admin-ds-giangvien', compact('user', 'gv',));
    }


    public function timKiemGiangVien(Request $request)
	{
        $user = Auth::user();


		$key = $request->table_search;


        $search = TaiKhoan::whereHas('maloaitk', function($q){
            $q->where('name', '1');
        })->where('name','like',"%".$key."%")
        //->orWhere('nip','like',"%".$key."%")
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




    public function thongTinGiangVien($id)
    {
        $user = Auth::user();
        $gv = User::findOrFail($id);
        return view('pages.admin.user.giangvien.hoso.avt', compact('user', 'gv',));
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


    public function thongTin($id)
    {
        $user = Auth::user();
    	$teacher = User::findOrFail($id);
    	return view('pages.admin.user.giangvien.hoso.trang-ca-nhan', compact('user', 'teacher',));
    }

    public function editProfileTeacher($id, Request $request)
    {

            $this->validate($request,[
                'name' => 'required',
                'tgl_lahir' => 'required',
                'bulan_lahir' => 'required',
                'tahun_lahir' => 'required',
                'nip' => 'required',
                'username' => 'required',
                'email' => 'email|required',
                'no_telp' => 'required'
            ]);

            $teacher = TaiKhoan::findOrFail($id);
            $teacher->name = $request->name;
            $teacher->tempat_lahir = $request->tempat_lahir;
            $teacher->tgl_lahir = $request->tgl_lahir;
            $teacher->bulan_lahir = $request->bulan_lahir;
            $teacher->tahun_lahir = $request->tahun_lahir;
            $teacher->jenis_kelamin = $request->jenis_kelamin;
            $teacher->agama = $request->agama;
            $teacher->nip = $request->nip;
            $teacher->jabatan = $request->jabatan;
            $teacher->username = $request->username;
            $teacher->email = $request->email;
            $teacher->save();


            $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

            return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPasswordTeacher($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $teacher = User::findOrFail($id);
        User::find($teacher->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }


    public function showStudentList()
    {
        $user = Auth::user();

        $students = User::whereHas('roles', function($q){
            $q->where('name', 'Student');
        })->get();

        return view('pages.okemin.user.student.showStudentList', compact('user', 'students',));
    }

    public function searchStudent(Request $request)
	{
        $user = Auth::user();


		$search = $request->table_search;


        $search = User::whereHas('roles', function($q){
            $q->where('name', 'Student');
        })->where('name','like',"%".$search."%")
        ->orWhere('nisn','like',"%".$search."%")
        ->orWhere('username','like',"%".$search."%")
        ->get();

		return view('pages.okemin.user.student.showStudentFiltered', compact('search', 'user') );
    }

    
    public function deleteStudent($id)
    {
        $user = Auth::user();
        $student = User::findOrFail($id);
        $student->delete();
        return redirect()->back()->with('success', 'User Berhasil diHapus.');
    }


    public function profilePictureStudent($id)
    {
        $user = Auth::user();
        $student = User::findOrFail($id);
        return view('pages.okemin.user.student.profile.picture', compact('user', 'student',));
    }

    public function updateAvatarStudent($id, Request $request){

        $request->validate([
            'avatar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ]);

        $student = User::findOrFail($id);

        $avatarName = $student->id.'_avatar'.time().'.'.request()->avatar->getClientOriginalExtension();

        $request->avatar->storeAs('avatars',$avatarName);

        $student->avatar = $avatarName;
        $student->save();

        return back()
            ->with('success','You have successfully upload image.');
    }


    public function showProfileStudent($id)
    {
        $user = Auth::user();
        $student = User::findOrFail($id);
        $kelas = Kelas::all();
    	return view('pages.okemin.user.student.profile.profilePage', compact('user', 'student', 'kelas'));
    }

    public function editProfileStudent($id, Request $request)
    {

        $this->validate($request,[
            'name' => 'required',
            'tgl_lahir' => 'required',
            'bulan_lahir' => 'required',
            'tahun_lahir' => 'required',
            'nisn' => 'required',
            'kelas' => 'required',
            'tahun_masuk' => 'required',
            'username' => 'required',
            'email' => 'email',
            'no_telp' => 'required',
        ]);

        $student = User::findOrFail($id);
        $student->name = $request->name;
        $student->tempat_lahir = $request->tempat_lahir;
        $student->tgl_lahir = $request->tgl_lahir;
        $student->bulan_lahir = $request->bulan_lahir;
        $student->tahun_lahir = $request->tahun_lahir;
        $student->jenis_kelamin = $request->jenis_kelamin;
        $student->nisn = $request->nisn;
        $student->agama = $request->agama;
        $student->kelas = $request->kelas;
        $student->jabatan = $request->jabatan;
        $student->tahun_masuk = $request->tahun_masuk;
        $student->username = $request->username;
        $student->email = $request->email;
        $student->no_telp = $request->no_telp;
        $student->save();


        $request->session()->flash('message.profile', 'Profile Details was successfully updated!');

        return redirect()->back();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function EditPasswordStudent($id, Request $request)
    {
        $request->validate([
            'new_password' => ['required'],
            'confirm_new_password' => ['same:new_password'],
        ]);
        $student = User::findOrFail($id);
        User::find($student->id)->update(['password'=> Hash::make($request->new_password)]);

        $request->session()->flash('message.password', 'Password was successfully updated!');

        return redirect()->back();
    }

    public function showCreateTeacher()
    {
        $user = Auth::user();
    	return view('pages.okemin.user.teacher.createTeacher', compact('user'));
    }

    public function createTeacher(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            "tgl_lahir" => 'required',
            "bulan_lahir" => 'required',
            "tahun_lahir" => 'required',
            "nip" => 'required|unique:users',
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "no_telp" => 'required',
        ]);

        $teacher = User::create([
            'nip' => $request->input('nip'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'jabatan' => $request->input('jabatan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'bulan_lahir' => $request->input('bulan_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'no_telp' => $request->input('no_telp')
        ]);
        $teacher->roles()->attach(Role::where('name', 'Teacher')->first());


        return back()->with('success','Teacher telah berhasil dibuat...');
    }

    // Teacher
    public function showCreateStudent()
    {
        $user = Auth::user();
        $kelas = Kelas::all();
    	return view('pages.okemin.user.student.createStudent', compact('user', 'kelas'));
    }

    public function createStudent(Request $request)
    {
        $this->validate($request,[
            'name' => 'required',
            "tgl_lahir" => 'required',
            "bulan_lahir" => 'required',
            "tahun_lahir" => 'required',
            "nisn" => 'required|unique:users',
            "username" => 'required|unique:users',
            "email" => 'required|unique:users',
            "kelas" => 'required',
            "tahun_masuk" => 'required',
            "no_telp" => 'required',
        ]);

        $teacher = User::create([
            'nisn' => $request->input('nisn'),
            'name' => $request->input('name'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'kelas' => $request->input('kelas'),
            'jabatan' => $request->input('jabatan'),
            'tempat_lahir' => $request->input('tempat_lahir'),
            'tgl_lahir' => $request->input('tgl_lahir'),
            'bulan_lahir' => $request->input('bulan_lahir'),
            'tahun_lahir' => $request->input('tahun_lahir'),
            'jenis_kelamin' => $request->input('jenis_kelamin'),
            'agama' => $request->input('agama'),
            'tahun_masuk' => $request->input('tahun_masuk'),
            'no_telp' => $request->input('no_telp')
        ]);
        $teacher->roles()->attach(Role::where('name', 'Student')->first());


        return back()->with('success','Student telah berhasil dibuat...');
    }

}


