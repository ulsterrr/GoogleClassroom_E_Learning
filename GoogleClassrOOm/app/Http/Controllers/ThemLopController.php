<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ThemLopController extends Controller
{
    public function themLop(Request $req)
    {
        $lopHoc = new LopHoc;
        $lopHoc->tenlop = $req->classname;
        $lopHoc->chude = $req->subject;
        $lopHoc->hinh = $req->radioname;
        $lopHoc->token = "";
        $lopHoc->code = Str::random(6);
        $lopHoc->ID_TaiKhoan = auth()->user()->id;
        $lopHoc->save();
        return redirect()->route("giang-vien");
    }
}
