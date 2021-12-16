<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocThongBao extends Model
{
    use HasFactory;
    protected $table = 'lop_hoc_thong_baos';
    public function lopHocBL(){
        return $this->hasMany('App\Models\LopHocBinhLuan');
    }
    public function lopHocBT(){
        return $this->hasMany('App\Models\LopHocBaiTap');
    }
    public function thuocveTaiKhoan(){
        return $this->belongsToMany('App\Models\TaiKhoan',
                                    'lop_hoc_binh_luans',
                                'thongbaoid','taikhoanid',
                                'id','id');
    }
}
