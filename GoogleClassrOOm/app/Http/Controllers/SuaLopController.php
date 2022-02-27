<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;
use Illuminate\Http\Request;

class SuaLopController extends Controller
{

    public function getLop($id)
    {
        $lophoc = LopHoc::find($id);
        return view("sua-lop-hoc", compact("lophoc"));
    }
    public function suaLop(Request $req, $id)
    {
        $lophoc = LopHoc::find($id);
        if (!empty($req->classname)) {
            $lophoc->tenlop = $req->classname;
        }
        if (!empty($req->subject)) {
            $lophoc->chude = $req->subject;
        }
        if (!empty($req->radioname)) {
            $lophoc->hinh = $req->radioname;
        }

        $lophoc->save();
        return redirect()->route("giang-vien");
    }
}
