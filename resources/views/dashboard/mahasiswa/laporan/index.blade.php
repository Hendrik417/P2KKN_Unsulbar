@extends('dashboard.mahasiswa.layouts.app')

@section('content')
<div class="container-fluid">
    {{-- Header Section --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h4 class="fw-bold mb-1" style="font-size: 1.75rem; color: #1a202c;">📄 Laporan KKN</h4>
            <p class="mb-0 text-secondary-light">Kelola dan unggah laporan KKN Anda</p>
        </div>
        <button class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#tambahLaporanModal" style="border-radius: 8px; padding: 0.6rem 1.5rem;">
            <iconify-icon icon="bx:plus" width="20" class="me-2"></iconify-icon>
            <span class="fw-semibold">Tambah Laporan Baru</span>
        </button>
    </div>

    {{-- Alert Messages --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border-left: 4px solid #dc3545;">
            <div class="d-flex align-items-center">
                <iconify-icon icon="bx:error-circle" width="20" class="me-2"></iconify-icon>
                <div>
                    <strong>Terjadi Kesalahan!</strong>
                    <ul class="mb-0 mt-2 ps-4">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert" style="border-radius: 8px; border-left: 4px solid #198754;">
            <div class="d-flex align-items-center">
                <iconify-icon icon="bx:check-circle" width="20" class="me-2"></iconify-icon>
                <span>{{ session('success') }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert" style="border-radius: 8px; border-left: 4px solid #dc3545;">
            <div class="d-flex align-items-center">
                <iconify-icon icon="bx:error-circle" width="20" class="me-2"></iconify-icon>
                <span>{{ session('error') }}</span>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Stats Card --}}
    <div class="row mb-4">
        <div class="col-md-3">
            <div class="card border-0 shadow-sm" style="border-radius: 12px; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                <div class="card-body text-white p-24">
                    <div class="d-flex justify-content-between align-items-center">
                        <div>
                            <p class="mb-1 opacity-75">Total Laporan</p>
                            <h3 class="mb-0 fw-bold">{{ count($laporan) }}</h3>
                        </div>
                        <iconify-icon icon="bx:file" width="40" class="opacity-50"></iconify-icon>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Table Laporan --}}
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow-sm" style="border-radius: 12px;">
                <div class="card-header bg-white border-bottom d-flex justify-content-between align-items-center p-24">
                    <div>
                        <h6 class="mb-0 fw-bold">📋 Daftar Laporan Anda</h6>
                    </div>
                    <div class="d-flex align-items-center gap-2">
                        <div class="input-group" style="width: 280px;">
                            <input type="text" class="form-control" placeholder="Cari laporan..." 
                                   id="searchInput" style="border-radius: 6px 0 0 6px;">
                            <button class="btn btn-outline-secondary" type="button" style="border-radius: 0 6px 6px 0;">
                                <iconify-icon icon="bx:search"></iconify-icon>
                            </button>
                        </div>
                    </div>
                </div>

                <div class="card-body p-0">
                    @if ($laporan->isEmpty())
                        <div class="text-center py-5">
                            <div style="font-size: 3rem; margin-bottom: 1rem;">📁</div>
                            <p class="text-secondary-light fw-semibold mb-3" style="font-size: 1.1rem;">Belum ada laporan yang diunggah</p>
                            <p class="text-secondary-light mb-4">Mulai unggah laporan KKN Anda sekarang untuk mengorganisir data dengan lebih baik</p>
                            <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahLaporanModal">
                                <iconify-icon icon="bx:plus" class="me-2"></iconify-icon>
                                Unggah Laporan Pertama
                            </button>
                        </div>
                    @else
                        <div class="table-responsive">
                            <table class="table mb-0" style="border-collapse: collapse;">
                                <thead>
                                    <tr style="background-color: #f8f9fa; border-bottom: 2px solid #dee2e6;">
                                        <th class="ps-24 py-16 fw-bold text-secondary-light" style="border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">No</th>
                                        <th class="py-16 fw-bold text-secondary-light" style="border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Nama Laporan</th>
                                        <th class="py-16 fw-bold text-secondary-light" style="border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Deskripsi</th>
                                        <th class="py-16 fw-bold text-secondary-light" style="border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px;">Tanggal Upload</th>
                                        <th class="pe-24 py-16 fw-bold text-secondary-light" style="border: none; font-size: 0.85rem; text-transform: uppercase; letter-spacing: 0.5px; text-align: right;">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($laporan as $item)
                                        <tr class="laporan-row" style="border-bottom: 1px solid #e9ecef; transition: all 0.3s ease;">
                                            <td class="ps-24 py-18 fw-medium" style="border: none;">{{ $loop->iteration }}</td>
                                            <td class="py-18" style="border: none;">
                                                <div class="d-flex align-items-center gap-2">
                                                    <div style="width: 40px; height: 40px; background-color: #e7f0ff; border-radius: 6px; display: flex; align-items: center; justify-content: center;">
                                                        <iconify-icon icon="bx:file-pdf" width="20" class="text-primary" v-if="isPdf"></iconify-icon>
                                                        <iconify-icon icon="bx:file-blank" width="20" class="text-primary"></iconify-icon>
                                                    </div>
                                                    <div>
                                                        <span class="fw-semibold d-block">{{ $item->nama_file }}</span>
                                                        <small class="text-secondary-light">{{ pathinfo($item->file_path, PATHINFO_EXTENSION) ? strtoupper(pathinfo($item->file_path, PATHINFO_EXTENSION)) : 'File' }}</small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="py-18" style="border: none;">
                                                @if ($item->deskripsi)
                                                    <small class="text-secondary-light d-block text-truncate" style="max-width: 200px;" title="{{ $item->deskripsi }}">
                                                        {{ Str::limit($item->deskripsi, 50) }}
                                                    </small>
                                                @else
                                                    <small class="text-secondary-light">-</small>
                                                @endif
                                            </td>
                                            <td class="py-18" style="border: none;">
                                                <small class="text-secondary-light">
                                                    {{ $item->tanggal_upload ? $item->tanggal_upload->format('d M Y') : 'N/A' }}<br>
                                                    <span class="text-muted" style="font-size: 0.75rem;">{{ $item->tanggal_upload ? $item->tanggal_upload->format('H:i') : '' }}</span>
                                                </small>
                                            </td>
                                            <td class="pe-24 py-18" style="border: none; text-align: right;">
                                                <div class="d-flex align-items-center gap-2 justify-content-end">
                                                    <a href="{{ route('mahasiswa.laporan.download', $item->id) }}" 
                                                       class="btn btn-sm btn-light-primary" 
                                                       title="Download Laporan"
                                                       style="border: 1px solid #cfe9ff; color: #0056b3; border-radius: 6px; padding: 0.4rem 0.8rem;">
                                                        <iconify-icon icon="bx:download" width="16"></iconify-icon>
                                                    </a>
                                                    <form action="{{ route('mahasiswa.laporan.destroy', $item->id) }}" 
                                                          method="POST" style="display: inline;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" 
                                                                class="btn btn-sm btn-light-danger" 
                                                                title="Hapus Laporan"
                                                                onclick="return confirm('Apakah Anda yakin ingin menghapus laporan ini?')"
                                                                style="border: 1px solid #f5c2c7; color: #842029; border-radius: 6px; padding: 0.4rem 0.8rem;">
                                                            <iconify-icon icon="bx:trash" width="16"></iconify-icon>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="5" class="text-center py-5" style="border: none;">
                                                <p class="text-secondary-light">Belum ada laporan</p>
                                            </td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Tambah Laporan --}}
<div class="modal fade" id="tambahLaporanModal" tabindex="-1" aria-labelledby="tambahLaporanModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0" style="border-radius: 12px; box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);">
            <div class="modal-header border-0 bg-light-subtle p-24" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); color: white; border-radius: 12px 12px 0 0;">
                <div>
                    <h5 class="modal-title fw-bold" id="tambahLaporanModalLabel">
                        <iconify-icon icon="bx:upload" width="24" class="me-2"></iconify-icon>
                        Unggah Laporan Baru
                    </h5>
                    <p class="mb-0 opacity-75" style="font-size: 0.85rem;">Silakan lengkapi informasi laporan Anda</p>
                </div>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="{{ route('mahasiswa.laporan.store') }}" method="POST" enctype="multipart/form-data" id="formTambahLaporan">
                @csrf
                <div class="modal-body p-24">
                    {{-- Nama File --}}
                    <div class="mb-20">
                        <label for="nama_file" class="form-label fw-semibold mb-2">
                            <span class="text-dark">Nama Laporan</span>
                            <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control" id="nama_file" name="nama_file" 
                               placeholder="Contoh: Laporan Kegiatan Minggu 1 KKN" required
                               style="border-radius: 6px; border: 1px solid #dee2e6; padding: 0.6rem 0.875rem;">
                        @error('nama_file')
                            <small class="text-danger d-block mt-1">
                                <iconify-icon icon="bx:error-circle" width="14" class="me-1"></iconify-icon>
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div class="mb-20">
                        <label for="deskripsi" class="form-label fw-semibold mb-2">
                            <span class="text-dark">Deskripsi</span>
                            <span class="text-muted" style="font-size: 0.85rem;">(Opsional)</span>
                        </label>
                        <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4" 
                                  placeholder="Jelaskan singkat isi laporan, kegiatan yang dilakukan, hasil yang diperoleh, dan catatan penting lainnya..."
                                  style="border-radius: 6px; border: 1px solid #dee2e6; padding: 0.6rem 0.875rem; resize: none;"></textarea>
                        <small class="text-secondary-light d-block mt-1">Sisa karakter: <span id="charCount">500</span>/500</small>
                        @error('deskripsi')
                            <small class="text-danger d-block mt-1">
                                <iconify-icon icon="bx:error-circle" width="14" class="me-1"></iconify-icon>
                                {{ $message }}
                            </small>
                        @enderror
                    </div>

                    {{-- File Upload --}}
                    <div class="mb-20">
                        <label for="file" class="form-label fw-semibold mb-2">
                            <span class="text-dark">Pilih File Laporan</span>
                            <span class="text-danger">*</span>
                        </label>
                        <div class="position-relative">
                            <div class="upload-area" id="uploadArea" style="border: 2px dashed #dee2e6; border-radius: 8px; padding: 2rem; text-align: center; cursor: pointer; transition: all 0.3s ease; background-color: #f8f9fa;">
                                <iconify-icon icon="bx:cloud-upload" width="40" class="text-primary mb-2 d-block"></iconify-icon>
                                <p class="mb-1 fw-semibold text-dark">Drag file ke sini atau klik untuk memilih</p>
                                <small class="text-secondary-light">Format: PDF, DOC, DOCX | Maksimal: 10 MB</small>
                                <input type="file" class="form-control d-none" id="file" name="file" 
                                       accept=".pdf,.doc,.docx" required onchange="handleFileSelect(this)">
                            </div>
                        </div>
                        @error('file')
                            <small class="text-danger d-block mt-2">
                                <iconify-icon icon="bx:error-circle" width="14" class="me-1"></iconify-icon>
                                {{ $message }}
                            </small>
                        @enderror
                        <div id="fileInfo" class="mt-3 p-3 bg-light rounded-2" style="display: none; border-left: 4px solid #28a745;">
                            <div class="d-flex align-items-center gap-2">
                                <iconify-icon icon="bx:check-circle" width="20" class="text-success"></iconify-icon>
                                <div>
                                    <p class="mb-1"><strong>File dipilih:</strong> <span id="fileName" class="text-primary fw-semibold"></span></p>
                                    <small class="text-secondary-light">Ukuran: <span id="fileSize"></span> | Tipe: <span id="fileType"></span></small>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer border-top bg-light p-24" style="border-radius: 0 0 12px 12px;">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal" style="border-radius: 6px; border: 1px solid #dee2e6; padding: 0.6rem 1.5rem;">
                        <span>Batal</span>
                    </button>
                    <button type="submit" class="btn btn-primary" style="border-radius: 6px; padding: 0.6rem 1.5rem; background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); border: none;">
                        <iconify-icon icon="bx:cloud-upload" width="18" class="me-2"></iconify-icon>
                        <span class="fw-semibold">Upload Laporan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<style>
    .laporan-row:hover {
        background-color: #f0f4ff !important;
    }

    .btn-light-primary {
        background-color: #e7f0ff;
        color: #0056b3;
        border: 1px solid #cfe9ff;
        transition: all 0.3s ease;
    }

    .btn-light-primary:hover {
        background-color: #cfe9ff;
        color: #003d82;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(0, 86, 179, 0.15);
    }

    .btn-light-danger {
        background-color: #ffe7eb;
        color: #842029;
        border: 1px solid #f5c2c7;
        transition: all 0.3s ease;
    }

    .btn-light-danger:hover {
        background-color: #f5c2c7;
        color: #721c24;
        transform: translateY(-2px);
        box-shadow: 0 2px 8px rgba(220, 53, 69, 0.15);
    }

    .upload-area:hover {
        border-color: #667eea;
        background-color: #f0f4ff;
    }

    .upload-area.dragover {
        border-color: #667eea;
        background-color: #e7f0ff;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
    }

    .form-control:focus {
        border-color: #667eea;
        box-shadow: 0 0 0 0.2rem rgba(102, 126, 234, 0.25);
    }

    .modal-header {
        border-radius: 12px 12px 0 0 !important;
    }

    p {
        margin-bottom: 0.5rem;
    }
</style>

@endsection

@section('js')
<script>
    // Upload area handling
    const uploadArea = document.getElementById('uploadArea');
    const fileInput = document.getElementById('file');

    if (uploadArea) {
        uploadArea.addEventListener('click', () => fileInput.click());

        ['dragenter', 'dragover', 'dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, preventDefaults, false);
        });

        function preventDefaults(e) {
            e.preventDefault();
            e.stopPropagation();
        }

        ['dragenter', 'dragover'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.add('dragover');
            });
        });

        ['dragleave', 'drop'].forEach(eventName => {
            uploadArea.addEventListener(eventName, () => {
                uploadArea.classList.remove('dragover');
            });
        });

        uploadArea.addEventListener('drop', (e) => {
            const files = e.dataTransfer.files;
            fileInput.files = files;
            handleFileSelect(fileInput);
        });
    }

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    if (searchInput) {
        searchInput.addEventListener('keyup', function() {
            const searchValue = this.value.toLowerCase();
            const rows = document.querySelectorAll('.laporan-row');
            
            rows.forEach(row => {
                const text = row.textContent.toLowerCase();
                row.style.display = text.includes(searchValue) ? '' : 'none';
            });
        });
    }

    // Handle file select
    function handleFileSelect(input) {
        if (input.files && input.files[0]) {
            const file = input.files[0];
            const fileSize = (file.size / 1024 / 1024).toFixed(2);
            
            const fileNameEl = document.getElementById('fileName');
            const fileSizeEl = document.getElementById('fileSize');
            const fileTypeEl = document.getElementById('fileType');
            const fileInfoEl = document.getElementById('fileInfo');
            
            if (fileNameEl && fileSizeEl && fileTypeEl && fileInfoEl) {
                fileNameEl.textContent = file.name;
                fileSizeEl.textContent = fileSize + ' MB';
                fileTypeEl.textContent = file.type || 'Unknown';
                fileInfoEl.style.display = 'block';
            }
        }
    }

    // Character counter for deskripsi
    const deskripsiInput = document.getElementById('deskripsi');
    if (deskripsiInput) {
        deskripsiInput.addEventListener('input', function() {
            const maxLength = 500;
            const currentLength = this.value.length;
            const remaining = maxLength - currentLength;
            document.getElementById('charCount').textContent = remaining;
            
            if (remaining < 0) {
                this.value = this.value.substring(0, maxLength);
            }
        });
    }
</script>
@endsection
