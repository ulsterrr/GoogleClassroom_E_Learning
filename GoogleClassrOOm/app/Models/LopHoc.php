<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;
    protected $table = 'lophoc';
    public function lopHocThongBao(){
        return $this->hasMany('App\Models\LopHocThongBao','lophocid','id');
    }
    public function coTaiKhoan(){
        return $this->belongsToMany('App\Models\TaiKhoan',
                                    'YeuCauLopHoc',
                                'lophocid','taikhoanid',
                                'id','id');
    }
    public function TaiKhoan(){
        return $this->belongsTo('App\Models\TaiKhoan','ID_TaiKhoan','id');
    }
}
