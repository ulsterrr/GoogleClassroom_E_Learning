<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class TaiKhoan extends Authenticatable
{
    use HasFactory;
    protected $table = 'taikhoan';

    public function loaiTaiKhoan(){
        return $this->belongsTo('App\Models\LoaiTaiKhoan','maloaitk','id');
    }
    public function coLopHoc(){
        return $this->belongsToMany('App\Models\LopHoc',
                                    'yeu_cau_lop_hocs',
                                'taikhoanid','lophocid',
                                'id','id');
    }
    public function taiKhoanYeuCau(){
        return $this->hasMany('App\Models\YeuCauLopHoc','taikhoanid','id');
    }
    public function taiKhoanBinhLuan(){
        return $this->hasMany('App\Models\LopHocBinhLuan','taikhoanid','id');
    }
}
