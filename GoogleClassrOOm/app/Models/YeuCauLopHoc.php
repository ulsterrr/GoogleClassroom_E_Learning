<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauLopHoc extends Model
{
    use HasFactory;
    protected $table = 'yeucaulophoc';
    public function TaiKhoan(){
        return $this->belongsTo('App\Models\TaiKhoan','taikhoanid','id');
    }
}
