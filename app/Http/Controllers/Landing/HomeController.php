<?php

namespace App\Http\Controllers\Landing;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /*
     * ==========================================
     * | Get Data                               |
     * ==========================================
    */
    public function index()
    {
        return view('landing.layouts.app');
    }
    /*
     * ==========================================
     * | End Get Data                           |
     * ==========================================
    */
}
