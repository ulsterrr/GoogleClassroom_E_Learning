<?php

use App\Http\Controllers\DangNhapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangKiController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\QuenMatKhauController;
use App\Http\Controllers\ThemLopController;


Route::get('/', function () {
    return view('trang-chu');
});

Route::get('/giang-vien', [GiangVienController::class, 'dsLopHoc'])->name('giang-vien')->middleware('auth');

Route::get('/hoc-sinh', function () {
    return view('hoc-sinh');
})->name('hoc-sinh');

Route::get('/dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap', [DangNhapController::class, 'xulyDangNhap'])->name('xuly-dangnhap')->middleware('guest');

Route::get('/dang-xuat', [DangNhapController::class, 'dangXuat'])->name('dang-xuat');

Route::get('/dang-ki-tai-khoan',function(){
    return view('dang-ki-tai-khoan');
})->name('DangKi');
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
