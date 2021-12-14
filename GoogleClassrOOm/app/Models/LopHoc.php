<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHoc extends Model
{
    use HasFactory;
    protected $table = 'lop_hocs';
    public function lopHocThongBao(){
        return $this->hasMany('App\Models\LopHocThongBao');
    }
    public function coTaiKhoan(){
        return $this->belongsToMany('App\Models\TaiKhoan');
    }
    public function lopHocYeuCau(){
        return $this->hasMany('App\Models\YeuCauLopHoc');
    }
}
