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
        if(!empty($req->classname)){
            $lophoc->tenlop=$req->classname;
        }
        if(!empty($req->subject)){
            $lophoc->chude=$req->subject;
        }
        if(!empty($req->radioname)){
            $lophoc->hinh = $req->radioname;
        }
        
        $lophoc->save();
        return redirect()->route("giang-vien");
    }
}
