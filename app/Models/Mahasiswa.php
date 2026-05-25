<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Mahasiswa extends Model
{
     protected $table = 'mahasiswa';


    protected $fillable = [

        'user_id',

        'nik',

        'nim',

        'nama_lengkap',

        'jenis_kelamin',

        'alamat',

        'tempat_lahir',

        'tanggal_lahir',

        'no_hp',

        'foto',

    ];


    public function user(): BelongsTo
    {
        return $this->belongsTo(
            User::class
        );
    }
}
