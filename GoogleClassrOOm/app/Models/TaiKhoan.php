<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'tai_khoans';

    public function loaiTaiKhoan(){
        return $this->hasOne('App\Models\LoaiTaiKhoan','maloaitk','id');
    }
    public function lopHoc(){
        return $this->belongsToMany('App\Models\LopHoc');
    }
    public function taiKhoanYeuCau(){
        return $this->hasMany('App\Models\YeuCauLopHoc');
    }
    public function taiKhoanBinhLuan(){
        return $this->hasMany('App\Models\LopHocBinhLuan');
    }
}
