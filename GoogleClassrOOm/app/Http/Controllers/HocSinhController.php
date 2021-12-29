<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use App\Models\TaiKhoan;
class HocSinhController extends Controller
{
    function getclass(){
        $class=TaiKhoan::find(auth()->user()->id);
        return view("hoc-sinh",compact("class"));
    }
}
