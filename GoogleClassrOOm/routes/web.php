<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DangKiController;
use App\Http\Controllers\DangNhapController;
use App\Http\Controllers\GiangVienController;
use App\Http\Controllers\GianhaplopController;
use App\Http\Controllers\HocSinhController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LopHocController;
use App\Http\Controllers\QuenMatKhauController;
use App\Http\Controllers\SuaLopController;
use App\Http\Controllers\ThemLopController;
use App\Http\Controllers\ThongBaoBaiTapController;
use App\Http\Controllers\XoaLopController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => '/', 'middleware' => ['auth', 'giangvien']], function () {
    Route::get('/giang-vien', [GiangVienController::class, 'dsLopHoc'])->name('giang-vien');
});

//Page ADMIN
Route::group(['prefix' => '/', 'middleware' => ['auth', 'admin']], function () {

    Route::get('/quan-tri-vien', [AdminController::class, 'dashAdmin'])->name('Admin');

    Route::get('/quan-tri-vien/thong-tin', function () {
        return view('pages.admin.hoso.admin-info');
    })->name('AdminInfo');

    Route::post('/quan-tri-vien/thong-tin', [AdminController::class, 'editAdmin'])->name('add-doi-thongtin');
    Route::post('/quan-tri-vien/thay-doi-mat-khau', [AdminController::class, 'thayDoiMK'])->name('add-doi-mk');
    Route::post('/quan-tri-vien/thay-doi-avt', [AdminController::class, 'capNhatAvtAdmin'])->name('add-doi-avt');
    Route::get('/quan-tri-vien/ds-admin', [AdminController::class, 'dsAdmin'])->name('ad-ds-ad');
    Route::get('/quan-tri-vien/tao-admin', [AdminController::class, 'taoAdminIndex'])->name('ad-tao-ad');
    Route::post('/quan-tri-vien/tao-admin', [AdminController::class, 'taoAdmin'])->name('add-tao-ad');
    Route::get('/quan-tri-vien/tim-kiem-admin', [AdminController::class, 'timKiemAdmin'])->name('ad-tim-ad');


//Lớp học
    Route::get('/quan-tri-vien/lop-hoc/ds-lophoc', [AdminController::class, 'dsLopHoc'])->name('ad-ds-lop');
    Route::get('/quan-tri-vien/lop-hoc/tim-kiem-lophoc', [AdminController::class, 'timKiemLopHoc'])->name('ad-tim-lop');
    Route::post('/quan-tri-vien/lop-hoc/ds-lophoc', [AdminController::class, 'taoLopHoc'])->name('add-tao-lop');

    Route::get('/quan-tri-vien/lop-hoc/xoa-lop/{id}', [AdminController::class, 'xoaLopHoc'])->name('ad-xoa-lop');

    Route::get('/quan-tri-vien/lop-hoc/sua-lop/{id}', [AdminController::class, 'suaLopHocIndex'])->name('ad-sua-lop');
    Route::post('/quan-tri-vien/lop-hoc/sua-lop/{id}', [AdminController::class, 'capNhatLopHoc'])->name('add-sua-lop');

//Giảng viên
    Route::get('/quan-tri-vien/giang-vien/ds-giangvien', [AdminController::class, 'dsGiangVien'])->name('ad-ds-gv');
    Route::get('/quan-tri-vien/giang-vien/tim-kiem-giangvien', [AdminController::class, 'timKiemGiangVien'])->name('ad-tim-gv');

    Route::get('/quan-tri-vien/giang-vien/tao-moi-giangvien', [AdminController::class, 'taoGiangVienIndex'])->name('ad-tao-gv');
    Route::post('/quan-tri-vien/giang-vien/tao-moi-giangvien', [AdminController::class, 'taoGiangVien'])->name('add-tao-gv');

    Route::get('/quan-tri-vien/giang-vien/xoa-giangvien/{id}', [AdminController::class, 'xoaGiangVien'])->name('ad-xoa-gv');

    Route::get('/quan-tri-vien/giang-vien/sua-thongtin/{id}', [AdminController::class, 'thongTinGiangVien'])->name('ad-sua-gv');
    Route::post('/quan-tri-vien/giang-vien/sua-thongtin/{id}', [AdminController::class, 'suaHoSoGiangVien'])->name('add-sua-gv');

    Route::post('/quan-tri-vien/giang-vien/doi-mat-khau/{id}', [AdminController::class, 'doiMKGiangVien'])->name('add-doimk-gv');

    Route::post('/quan-tri-vien/giang-vien/doi-avt/{id}', [AdminController::class, 'capNhatAvtGiangVien'])->name('add-avt-gv');

//Học viên
    Route::get('/quan-tri-vien/hoc-vien/ds-hocvien', [AdminController::class, 'dsHocVien'])->name('ad-ds-hs');
    Route::get('/quan-tri-vien/hoc-vien/tim-kiem-hocvien', [AdminController::class, 'timKiemHocVien'])->name('ad-tim-hs');

    Route::get('/quan-tri-vien/hoc-vien/tao-moi-hocvien', [AdminController::class, 'taoHocVienIndex'])->name('ad-tao-hs');
    Route::post('/quan-tri-vien/hoc-vien/tao-moi-hocvien', [AdminController::class, 'taoHocVien'])->name('add-tao-hs');

    Route::get('/quan-tri-vien/giang-vien/xoa-hocvien/{id}', [AdminController::class, 'xoaHocVien'])->name('ad-xoa-hs');

    Route::get('/quan-tri-vien/hoc-vien/sua-thongtin/{id}', [AdminController::class, 'thongTinHocVien'])->name('ad-sua-hs');
    Route::post('/quan-tri-vien/hoc-vien/sua-thongtin/{id}', [AdminController::class, 'suaHoSoHocVien'])->name('add-sua-hs');

    Route::post('/quan-tri-vien/hoc-vien/doi-mat-khau/{id}', [AdminController::class, 'doiMKHocVien'])->name('add-doimk-hs');
    Route::post('/quan-tri-vien/hoc-vien/doi-avt/{id}', [AdminController::class, 'doiAvtHocVien'])->name('add-avt-hs');

});
//

Route::get('/', function () {
    return view('dang-nhap');
})->name('DangNhap');

//Route::get('/giang-vien', [GiangVienController::class, 'dsLopHoc'])->name('giang-vien')->middleware('auth');

Route::get('/hoc-sinh', [HocSinhController::class, 'getclass'])->name('hoc-sinh');

Route::get('/dang-nhap', [DangNhapController::class, 'dangNhap'])->name('dang-nhap')->middleware('guest');
Route::post('/dang-nhap', [DangNhapController::class, 'xulyDangNhap'])->name('xuly-dangnhap')->middleware('guest');

Route::get('/dang-xuat', [DangNhapController::class, 'dangXuat'])->name('dang-xuat');

Route::get('/dang-ki-tai-khoan', function () {
    return view('dang-ki-tai-khoan');
})->name('DangKi');
Route::get('/cap-nhat-tai-khoan', [HomeController::class, 'suaTK']
)->name('cap-nhat-tai-khoan')->middleware('auth');
Route::post('/cap-nhat-tai-khoan', [HomeController::class, 'editTK']
)->name('xl-cap-nhat-tai-khoan')->middleware('auth');
Route::get('/chi-tiet-tai-khoan', function () {
    return view('chi-tiet-tai-khoan');
})->name('youraccount');
Route::post('/dang-ki-tai-khoan', [DangKiController::class, 'dangKi']
)->name('dang-ki');

Route::get('/quen-mat-khau', function () {
    return view('quen-mk');
})->name('quenMK');
Route::post('/quen-mat-khau', [QuenMatKhauController::class, 'quenMatKhau'])->name('quenMatKhau');

Route::get('/them-lop-hoc', function () {
    return view('them-lop-hoc');
})->name('ThemLop');
Route::post('/them-lop-hoc', [ThemLopController::class, 'themLop']
)->name('themlop');

Route::get('sua-lop-hoc/{id}', [SuaLopController::class, 'getLop'])->name('SuaLop');
Route::post('sua-lop-hoc/{id}', [SuaLopController::class, 'suaLop']
)->name('sualophoc');

Route::get('xoa-lop-hoc/{id}', [XoaLopController::class, 'xoaLop'])->name('XoaLop');

Route::get('xoa-bai-viet/{id}', [LopHocController::class, 'xoaBaiDang'])->name('XoaBaiDang');

Route::post('gia-nhap-lop', [GianhaplopController::class, 'gianhaplop'])->name('GiaNhapLop');

Route::get('chi-tiet-lop-hoc/{id}', [LopHocController::class, 'detailClass'])->name("ChiTietLopHoc");

Route::get('lop-hoc/{id}', [HomeController::class, 'vaoLop'])->name('LopHoc');
//Route::post('lop-hoc/{id}',[HomeController::class,'suaLop'])->name('sualophoc');

Route::get('danh-sach-cho/{id}', [LopHocController::class, 'danhSachSinhVien'])->name('dsSinhVien');
Route::get('confirmStudent/{idtaikhoan}/{idlop}', [LopHocController::class, 'confirmstudent'])->name('confirmstudent');
Route::get('deleteStudent/{idtaikhoan}/{idlop}', [LopHocController::class, 'deleteStudent'])->name('deletestudent');

Route::post('them-bai-dang/{id}', [LopHocController::class, 'themBaiDang'])->name('themBaiDang');

Route::post('addmail/{id}', [LopHocController::class, 'addstudentbymail'])->name('AddMail');

Route::post('/binhluan/{id}', [LopHocController::class, 'thembinhluan']
)->name('thembinhluan');
Route::post('addmail/{id}', [LopHocController::class, 'addstudentbymail'])->name('AddMail');
Route::get('thong-bao-bai-tap/{id}', [ThongBaoBaiTapController::class, 'getBaiTap'])->name('thongBaoBaiTap');
