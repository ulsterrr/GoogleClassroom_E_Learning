<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;

class LopHocController extends Controller
{
    function detailClass($id){
        $class=LopHoc::find($id);
        return view('chi-tiet-lop-hoc',compact('class'));
    }
}
