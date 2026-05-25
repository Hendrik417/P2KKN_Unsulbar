<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(
            'mahasiswa',
            function (Blueprint $table) {
                $table->id();
                /*
                |--------------------------------
                | Relation user
                |--------------------------------
                */
                $table->foreignId(
                    'user_id')->unique()->constrained('users')->cascadeOnDelete();
                /*
                |--------------------------------
                | Biodata mahasiswa
                |--------------------------------
                */
                $table->char( 'nik', 20 )->unique();
                $table->char( 'nim', 20 )->unique();
                $table->string( 'nama_lengkap', 128 );
                $table->enum(  'jenis_kelamin', ['L', 'P'] );
                $table->longText('alamat');
                $table->string('tempat_lahir',128);
                $table->date('tanggal_lahir');
                $table->char('no_hp',15)->unique();
                $table->string('foto',128)->nullable();
                $table->timestamps();
            }
        );
    }


    public function down(): void
    {
        Schema::dropIfExists(
            'mahasiswa'
        );
    }
};