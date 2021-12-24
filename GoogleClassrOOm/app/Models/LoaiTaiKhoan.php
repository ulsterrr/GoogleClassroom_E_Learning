<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiTaiKhoan extends Model
{
    use HasFactory;
    protected $table = 'loaitaikhoan';
    public function taiKhoan(){
        return $this->hasMany('App\Models\TaiKhoan','maloaitk','id');
    }
}
