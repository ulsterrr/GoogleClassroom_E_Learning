<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YeuCauLopHoc extends Model
{
    use HasFactory;
    protected $table = 'yeu_cau_lop_hocs';

    public function thuocTaiKhoan(){
        return $this->hasOne('App\Models\TaiKhoan','taikhoanid','id');
    }
}
