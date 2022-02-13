<?php

use App\Http\Controllers\DangNhapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangKiController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\QuenMatKhauController;
use App\Http\Controllers\ThemLopController;
use App\Http\Controllers\SuaLopController;
use App\Http\Controllers\XoaLopController;
use App\Http\Controllers\GianhaplopController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\ThongBaoBaiTapController;
Route::group(['prefix'=>'/', 'middleware' => ['auth','giangvien']],function(){
    Route::get('/giang-vien', [GiangVienController::class, 'dsLopHoc'])->name('giang-vien');
});


Route::get('/', function () {
    return view('dang-nhap');
});

//Route::get('/giang-vien', [GiangVienController::class, 'dsLopHoc'])->name('giang-vien')->middleware('auth');

Route::get('/hoc-sinh',[HocSinhController::class,'getclass'])->name('hoc-sinh');

Route::get('/dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap', [DangNhapController::class, 'xulyDangNhap'])->name('xuly-dangnhap')->middleware('guest');

Route::get('/dang-xuat', [DangNhapController::class, 'dangXuat'])->name('dang-xuat');

Route::get('/dang-ki-tai-khoan',function(){
    return view('dang-ki-tai-khoan');
})->name('DangKi');
Route::get('/cap-nhat-tai-khoan',[HomeController::class,'suaTK']
)->name('cap-nhat-tai-khoan')->middleware('auth');
Route::post('/cap-nhat-tai-khoan',[HomeController::class,'editTK']
)->name('xl-cap-nhat-tai-khoan')->middleware('auth');
Route::get('/chi-tiet-tai-khoan',function(){
    return view('chi-tiet-tai-khoan');
})->name('youraccount');
Route::post('/dang-ki-tai-khoan',[DangKiController::class,'dangKi']
)->name('dang-ki');

Route::get('/quen-mat-khau', function () {
    return view('quen-mk');
})->name('quenMK');
Route::post('/quen-mat-khau',[QuenMatKhauController::class,'quenMatKhau'])->name('quenMatKhau');

Route::get('/them-lop-hoc',function(){
    return view('them-lop-hoc');
})->name('ThemLop');
Route::post('/them-lop-hoc',[ThemLopController::class,'themLop']
)->name('themlop');

Route::get('sua-lop-hoc/{id}',[SuaLopController::class,'getLop'])->name('SuaLop');
Route::post('sua-lop-hoc/{id}',[SuaLopController::class,'suaLop']
)->name('sualophoc');

Route::get('xoa-lop-hoc/{id}',[XoaLopController::class,'xoaLop'])->name('XoaLop');

Route::get('xoa-bai-viet/{id}',[LopHocController::class,'xoaBaiDang'])->name('XoaBaiDang');

Route::post('gia-nhap-lop',[GianhaplopController::class,'gianhaplop'])->name('GiaNhapLop');

Route::get('chi-tiet-lop-hoc/{id}',[LopHocController::class,'detailClass'])->name("ChiTietLopHoc");

Route::get('lop-hoc/{id}',[HomeController::class,'vaoLop'])->name('LopHoc');
//Route::post('lop-hoc/{id}',[HomeController::class,'suaLop'])->name('sualophoc');

Route::get('danh-sach-cho/{id}',[LopHocController::class,'danhSachSinhVien'])->name('dsSinhVien');
Route::get('confirmStudent/{idtaikhoan}/{idlop}',[LopHocController::class,'confirmstudent'])->name('confirmstudent');
Route::get('deleteStudent/{idtaikhoan}/{idlop}',[LopHocController::class,'deleteStudent'])->name('deletestudent');

Route::post('them-bai-dang/{id}',[LopHocController::class,'themBaiDang'])->name('themBaiDang');
Route::post('/binhluan/{id}',[LopHocController::class,'thembinhluan']
)->name('thembinhluan');
Route::post('addmail/{id}',[LopHocController::class,'addstudentbymail'])->name('AddMail');

Route::get('thong-bao-bai-tap/{id}',[ThongBaoBaiTapController::class,'getBaiTap'])->name('thongBaoBaiTap');