<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LopHocBaiTap extends Model
{
    use HasFactory;
    protected $table = 'lophocbaitap';

    public function thuocveThongBao(){
        return $this->belongsTo('App\Models\LopHocThongBao','thongbaoid','id');
    }
}
