<?php

use App\Http\Controllers\DangNhapController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DangKiController;
use App\Http\Controllers\QuenMatKhauController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/giang-vien', function () {
    return view('giang-vien');
})->name('giang-vien');

Route::get('/hoc-sinh', function () {
    return view('hoc-sinh');
})->name('hoc-sinh');

Route::get('/dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap');
Route::post('/dang-nhap', [DangNhapController::class, 'xulyDangNhap'])->name('xuly-dangnhap');


Route::get('/dang-ki-tai-khoan',function(){
    return view('dang-ki-tai-khoan');
});
Route::post('/dang-ki-tai-khoan',[DangKiController::class,'dangKi']
)->name('dang-ki');
Route::get('/quen-mat-khau', function () {
    return view('quen-mk');
})->name('quenMK');
Route::post('/quen-mat-khau',[QuenMatKhauController::class,'quenMatKhau'])->name('quenMatKhau');
