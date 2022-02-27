<?php

namespace App\Http\Controllers;

use App\Models\TaiKhoan;

class HocSinhController extends Controller
{
    public function getclass()
    {
        $class = TaiKhoan::find(auth()->user()->id);
        return view("hoc-sinh", compact("class"));
    }
}
