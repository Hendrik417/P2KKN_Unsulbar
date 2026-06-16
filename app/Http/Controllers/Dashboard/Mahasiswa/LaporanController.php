<?php

namespace App\Http\Controllers\Dashboard\Mahasiswa;

use App\Http\Controllers\Controller;
use App\Models\Laporan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class LaporanController extends Controller
{
    /**
     * Display a listing of the laporan.
     */
    public function index()
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Jika data mahasiswa tidak ada, create data dummy
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => 'TMP' . time(),
                'nama_lengkap' => $user->name,
                'jenis_kelamin' => 'L',
                'alamat' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => now()->subYears(20),
            ]);
        }

        $laporan = Laporan::where('mahasiswa_id', $mahasiswa->id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('dashboard.mahasiswa.laporan.index', compact('laporan', 'mahasiswa'));
    }

    /**
     * Store a newly created laporan in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_file' => 'required|string|max:255',
            'file' => 'required|file|mimes:pdf,doc,docx|max:10240', // Max 10MB
            'deskripsi' => 'nullable|string',
        ]);

        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Auto-create mahasiswa jika belum ada
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => 'TMP' . time(),
                'nama_lengkap' => $user->name,
                'jenis_kelamin' => 'L',
                'alamat' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => now()->subYears(20),
            ]);
        }

        try {
            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $fileName = time() . '_' . $file->getClientOriginalName();
                $filePath = $file->storeAs('laporan/' . $mahasiswa->id, $fileName, 'public');

                Laporan::create([
                    'mahasiswa_id' => $mahasiswa->id,
                    'user_id' => $user->id,
                    'nama_file' => $validated['nama_file'],
                    'file_path' => $filePath,
                    'deskripsi' => $validated['deskripsi'] ?? null,
                    'tanggal_upload' => now(),
                ]);

                return redirect()->route('mahasiswa.laporan.index')
                    ->with('success', 'Laporan berhasil diunggah');
            }
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.laporan.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Download the specified laporan file.
     */
    public function download(Laporan $laporan)
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Auto-create mahasiswa jika belum ada
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => 'TMP' . time(),
                'nama_lengkap' => $user->name,
                'jenis_kelamin' => 'L',
                'alamat' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => now()->subYears(20),
            ]);
        }

        // Check if user is authorized to download
        if ($laporan->mahasiswa_id !== $mahasiswa->id) {
            abort(403, 'Unauthorized action.');
        }

        return Storage::disk('public')->download($laporan->file_path);
    }

    /**
     * Delete the specified laporan.
     */
    public function destroy(Laporan $laporan)
    {
        $user = auth()->user();
        $mahasiswa = Mahasiswa::where('user_id', $user->id)->first();

        // Auto-create mahasiswa jika belum ada
        if (!$mahasiswa) {
            $mahasiswa = Mahasiswa::create([
                'user_id' => $user->id,
                'nim' => 'TMP' . time(),
                'nama_lengkap' => $user->name,
                'jenis_kelamin' => 'L',
                'alamat' => '-',
                'tempat_lahir' => '-',
                'tanggal_lahir' => now()->subYears(20),
            ]);
        }

        // Check if user is authorized to delete
        if ($laporan->mahasiswa_id !== $mahasiswa->id) {
            abort(403, 'Unauthorized action.');
        }

        try {
            // Delete file from storage
            if (Storage::disk('public')->exists($laporan->file_path)) {
                Storage::disk('public')->delete($laporan->file_path);
            }

            // Delete from database
            $laporan->delete();

            return redirect()->route('mahasiswa.laporan.index')
                ->with('success', 'Laporan berhasil dihapus');
        } catch (\Exception $e) {
            return redirect()->route('mahasiswa.laporan.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
