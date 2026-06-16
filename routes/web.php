<?php

use App\Http\Controllers\Dashboard\Mahasiswa\HomeController as DMHomeController;
use App\Http\Controllers\Dashboard\Mahasiswa\PendaftaranController as DMPendaftaranController;
use App\Http\Controllers\Dashboard\Mahasiswa\LaporanController as DMLaporanController;
use App\Http\Controllers\Dashboard\Staff\PendaftaranController;
use App\Http\Controllers\Dashboard\Dosen\HomeController as DDHomeController;
use App\Http\Controllers\Dashboard\Staff\HomeController as DSHomeController;
use App\Http\Controllers\Auth\RegisterController;

use App\Http\Controllers\Landing\HomeController as LPHomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('dashboard.mahasiswa.layouts.app');
// });

Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::get('/register', [RegisterController::class, 'create'])->name('register');
// Route::post('/register', [RegisterController::class, 'store']);
/* ========================================== */
/* | Group Landing Page                     | */
/* ========================================== */
Route::as('lp.')->group(function () {
    /* route home */
    Route::controller(LPHomeController::class)->group(function () {
        Route::get('/', 'index')->name('home');
    });
});
/* ========================================== */
/* | End Group Landing Page                 | */
/* ========================================== */

/*
|--------------------------------------------------------------------------
| Route Mahasiswa
|--------------------------------------------------------------------------
*/

Route::prefix('mahasiswa')->as('mahasiswa.')->middleware(['auth','role:mahasiswa'])->group(function () {
        /* ################################################## */
        /* # Route Home                                     # */
        /* ################################################## */
        Route::controller(DMHomeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
        /* ################################################## */
        /* # End Route Home                                 # */
        /* ################################################## */

        Route::controller(DMPendaftaranController::class)->group(function () {
            Route::get('/pendaftaran', 'index')->name('pendaftaran.index');
        });

        /* ################################################## */
        /* # Route Laporan                                  # */
        /* ################################################## */
        Route::controller(DMLaporanController::class)->group(function () {
            Route::get('/laporan', 'index')->name('laporan.index');
            Route::post('/laporan', 'store')->name('laporan.store');
            Route::get('/laporan/{laporan}/download', 'download')->name('laporan.download');
            Route::delete('/laporan/{laporan}', 'destroy')->name('laporan.destroy');
        });
        /* ################################################## */
        /* # End Route Laporan                              # */
        /* ################################################## */
    });
/*
|--------------------------------------------------------------------------
| End Route Mahasiswa
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route Dosen
|--------------------------------------------------------------------------
*/

Route::prefix('dosen')->as('dosen.')->middleware(['auth','role:dosen'])->group(function () {
        /* ################################################## */
        /* # Route Home                                     # */
        /* ################################################## */
        Route::controller(DDHomeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
        /* ################################################## */
        /* # End Route Home                                 # */
        /* ################################################## */
    });

        /* route kurikulum */
                // Route::resource('laporan', PendaftaranController::class)
                //     ->parameter('laporan', 'id')
                //     ->only(['index', 'show', 'store', 'update', 'destroy']);
        /* end route kurikulum */
/*
|--------------------------------------------------------------------------
| End Route Dosen
|--------------------------------------------------------------------------
*/

/*
|--------------------------------------------------------------------------
| Route Dosen
|--------------------------------------------------------------------------
*/

Route::prefix('staff')->as('staff.')->middleware([
        'auth',
        'role:staff'
    ])->group(function () {
        /* ################################################## */
        /* # Route Home                                     # */
        /* ################################################## */
        Route::controller(DSHomeController::class)->group(function () {
            Route::get('/', 'index')->name('index');
        });
        /* ################################################## */
        /* # End Route Home                                 # */
        /* ################################################## */
    });

       /* route pendaftaran */
                Route::resource('pendaftaran', PendaftaranController::class)
                    ->parameter('pendaftaran', 'id')
                    ->only(['index', 'show', 'store', 'update', 'destroy']);
        /* end route pendaftaran */
/*
|--------------------------------------------------------------------------
| End Route Dosen
|--------------------------------------------------------------------------
*/
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
