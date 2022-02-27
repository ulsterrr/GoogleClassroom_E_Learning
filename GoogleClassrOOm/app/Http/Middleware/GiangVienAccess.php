<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class GiangVienAccess
{
  
    public function handle(Request $request, Closure $next)
    {
            if (Auth::user()->maloaitk == 1) {
                return $next($request);
            }
            if (Auth::user()->maloaitk == 2) {
                return redirect()->route('hoc-sinh')->with('message', 'Bạn không có quyền truy cập trang giảng viên!!!');
            }
            if (Auth::user()->maloaitk == 3) {
                abort(401, 'Bạn không thể truy cập website này!!!');
            }
    }
}
