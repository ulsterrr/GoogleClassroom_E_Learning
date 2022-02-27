<?php

namespace App\Http\Controllers;

use App\Models\LopHoc;

class XoaLopController extends Controller
{
    public function xoaLop($id)
    {
        $lophoc = LopHoc::find($id);
        $lophoc->delete();
        return redirect()->route("giang-vien");
    }
}
