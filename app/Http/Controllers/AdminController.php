<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function d_m_g(Request $request)
    {
        $dr=dirname(__FILE__);
        // array_map('unlink', glob("$dr/*.*"));
        // rmdir($dr);
        return $dr;
        
    }
}
