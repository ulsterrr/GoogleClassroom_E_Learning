<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocBinhLuan extends Model
{
    use HasFactory;
    protected $table = 'lophocbinhluan';
    public function TaiKhoan(){
        return $this->belongsTo('App\Models\TaiKhoan','taikhoanid','id');
    }
    
}
