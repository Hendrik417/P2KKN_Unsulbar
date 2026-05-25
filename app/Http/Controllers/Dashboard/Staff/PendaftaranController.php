<?php

namespace App\Http\Controllers\Dashboard\Staff;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PendaftaranController extends Controller
{
    public function index()
    {
        return view('dashboard.staff.pendaftaran.index');
    }
    public function store(Request $request)
    { 
        // dd($request->all());
        $request->validate([
            'nik'             => 'required|unique:mahasiswa,nik',
            'nim'             => 'required|unique:mahasiswa,nim',
            'nama_lengkap'    => 'required',
            'jenis_kelamin'   => 'required',
            'alamat'          => 'required',
            'tempat_lahir'    => 'required',
            'tanggal_lahir'   => 'required',
            'no_hp'           => 'required|unique:mahasiswa,no_hp',
        ]);

        DB::beginTransaction();

        try {

            /*
            |------------------------------------------
            | Create user
            |------------------------------------------
            */
            $user = User::create([
                'name'      => $request->nama_lengkap,

                // email otomatis dari nim
                'email'     => $request->nim . '@gmail.com',

                // password = nim
                'password'  => Hash::make($request->nim),
            ]);

            /*
            |------------------------------------------
            | Assign role mahasiswa
            |------------------------------------------
            */
            $user->assignRole('mahasiswa');

            /*
            |------------------------------------------
            | Create mahasiswa
            |------------------------------------------
            */
            Mahasiswa::create([
                'user_id'          => $user->id,
                'nik'              => $request->nik,
                'nim'              => $request->nim,
                'nama_lengkap'     => $request->nama_lengkap,
                'jenis_kelamin'    => $request->jenis_kelamin,
                'alamat'           => $request->alamat,
                'tempat_lahir'     => $request->tempat_lahir,
                'tanggal_lahir'    => $request->tanggal_lahir,
                'no_hp'            => $request->no_hp,
            ]);

            DB::commit();

            return redirect()
                ->route('staff.index')
                ->with('success', 'Data mahasiswa berhasil ditambah');
        } catch (\Throwable $th) {

            DB::rollBack();

            return back()->with(
                'error',
                $th->getMessage()
            );
        }
    }
}
