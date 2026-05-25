<?php

namespace App\Http\Controllers\Dashboard\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
     public function index()
    {
        return view('dashboard.dosen.index');
    }
}
