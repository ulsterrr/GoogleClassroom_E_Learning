<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LopHoc;
use Illuminate\Support\Str;
class SuaLopController extends Controller
{
    
    function getLop($id){
        $lophoc=LopHoc::find($id);
        return view("sua-lop-hoc",compact("lophoc"));
    }
    function suaLop(Request $req,$id){
        $lophoc=LopHoc::find($id);
        $lophoc->tenlop=$req->classname;
        $lophoc->chude=$req->subject;
        $lophoc->hinh = $req->radioname;
        $lophoc->save();
        return redirect()->route("giang-vien");
    }
}
