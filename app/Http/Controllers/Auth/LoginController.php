<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;


    protected $redirectTo = '/home';


    public function __construct()
    {
        $this->middleware('guest')
            ->except('logout');

        $this->middleware('auth')
            ->only('logout');
    }


    protected function authenticated(
        $request,
        $user
    ) {

        /*
        |--------------------------------------------------
        | Role Mahasiswa
        |--------------------------------------------------
        */
        if ($user->hasRole('mahasiswa')) {

            return redirect()
                ->route('mahasiswa.index');

        }


        /*
        |--------------------------------------------------
        | Role Dosen
        |--------------------------------------------------
        */
        if ($user->hasRole('dosen')) {

            return redirect()
                ->route('dosen.index');

        }


        /*
        |--------------------------------------------------
        | Role Staff
        |--------------------------------------------------
        */
        if ($user->hasRole('staff')) {

            return redirect()
                ->route('staff.index');

        }


        /*
        |--------------------------------------------------
        | Role Tidak Dikenal
        |--------------------------------------------------
        */
        Auth::logout();

        return redirect('/login');
    }
}