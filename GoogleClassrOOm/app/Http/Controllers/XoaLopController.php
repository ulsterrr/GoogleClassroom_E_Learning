<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;

class XoaLopController extends Controller
{
    function xoaLop($id){
        $lophoc=LopHoc::find($id);
        $lophoc->delete();
        return redirect()->route("giang-vien");
    }
}
