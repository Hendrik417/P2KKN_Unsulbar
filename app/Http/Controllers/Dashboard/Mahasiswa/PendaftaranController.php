<?php

namespace App\Http\Controllers\Dashboard\Mahasiswa;

use App\Http\Controllers\Controller;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('dashboard.mahasiswa.pendaftaran.index');
    }
}
