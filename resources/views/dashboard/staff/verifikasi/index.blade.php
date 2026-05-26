 @extends('dashboard.staff.layouts.app')
@section('content')
<style>

/*
|--------------------------------------------------------------------------
| CALENDAR KKN
|--------------------------------------------------------------------------
*/

#calendarKKN{
    min-height:420px;
}


.legend-box{
    width:12px;
    height:12px;
    border-radius:4px;
}


.fc .fc-toolbar-title{
    font-size:14px;
    font-weight:600;
    color:#0f172a;
}


.fc .fc-button{
    border:none !important;

    padding:6px 10px !important;

    font-size:12px !important;

    border-radius:10px !important;

    background:#f8fafc !important;

    color:#475569 !important;

    box-shadow:none !important;

    transition:.3s;
}


.fc .fc-button:hover{
    background:#fff1f2 !important;
    color:#ef4444 !important;
}


.fc .fc-button-active{
    background:#ef4444 !important;
    color:white !important;
}


.fc-event{
    border:none !important;

    padding:4px 6px !important;

    border-radius:8px !important;

    font-size:11px;

    font-weight:600;
}



/*
|--------------------------------------------------------------------------
| HEADER KKN
|--------------------------------------------------------------------------
*/

.kkn-header{

    min-height:130px;

    padding:32px;

    display:flex;
    flex-direction:column;
    justify-content:flex-end;

    background:
        linear-gradient(
            135deg,
            #5f1904 0%,
            #e93d3d 100%
        );

    box-shadow:
        0 8px 24px rgba(0,0,0,.08);
}


.kkn-title{

    margin:0 0 6px 0;

    color:#fff;

    font-size:28px;

    font-weight:700;

    letter-spacing:-.5px;
}


.kkn-subtitle{

    margin:0;

    color:rgba(255,255,255,.85);

    font-size:13px;
}



/*
|--------------------------------------------------------------------------
| FORM KKN
|--------------------------------------------------------------------------
*/

.form-label-custom{

    display:block;

    margin-bottom:8px;

    font-size:11px;

    font-weight:700;

    text-transform:uppercase;

    letter-spacing:1px;

    color:#94a3b8;
}



.form-kkn{

    height:52px;

    border:1px solid #e2e8f0 !important;

    border-radius:14px !important;

    background:#f8fafc !important;

    padding:0 18px !important;

    font-size:14px;

    color:#0f172a;

    box-shadow:none !important;

    transition:.3s;
}


.form-kkn::placeholder{
    color:#94a3b8;
}


.form-kkn:hover{
    background:white !important;
}


.form-kkn:focus{

    background:white !important;

    border-color:#ef4444 !important;

    box-shadow:
        0 0 0 4px rgba(239,68,68,.08) !important;
}



/*
|--------------------------------------------------------------------------
| SELECT
|--------------------------------------------------------------------------
*/

select.form-kkn{

    cursor:pointer;

    appearance:none;
    -webkit-appearance:none;
    -moz-appearance:none;

    padding-right:48px !important;

    background-image:
        url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='18' height='18' fill='none' stroke='%2394a3b8' stroke-width='2' viewBox='0 0 24 24'%3E%3Cpath d='m6 9 6 6 6-6'/%3E%3C/svg%3E");

    background-repeat:no-repeat;

    background-position:right 16px center;

    background-size:16px;
}



/*
|--------------------------------------------------------------------------
| FILE UPLOAD
|--------------------------------------------------------------------------
*/

.upload-box{

    min-height:160px;

    border:2px dashed #e2e8f0;

    border-radius:20px;

    display:flex;

    flex-direction:column;

    justify-content:center;

    align-items:center;

    gap:10px;

    cursor:pointer;

    transition:.3s;
}


.upload-box:hover{

    background:#fff7ed;

    border-color:#ef4444;
}


.upload-box iconify-icon{

    color:#cbd5e1;

    transition:.3s;
}


.upload-box:hover iconify-icon{

    color:#ef4444;
}


.upload-box span{

    font-size:12px;

    font-weight:600;

    color:#64748b;

    text-align:center;
}



/*
|--------------------------------------------------------------------------
| BUTTON
|--------------------------------------------------------------------------
*/

.btn-kkn-submit{

    min-width:140px;

    height:48px;

    border:none;

    border-radius:12px;

    background:#6d1515;

    color:white;

    font-size:13px;

    font-weight:700;

    text-transform:uppercase;

    transition:.3s;
}


.btn-kkn-submit:hover{

    transform:translateY(-1px);

    box-shadow:
        0 8px 20px rgba(239,68,68,.25);
}


.btn-kkn-cancel{

    min-width:120px;

    height:48px;

    border:none;

    border-radius:12px;

    background:#adb1b4;

    color:#212222;

    font-size:13px;

    font-weight:600;

    transition:.3s;
}


.btn-kkn-cancel:hover{

    background:#e2e8f0;
}

</style>

<style>
.kkn-header{
    min-height:130px;
    padding:32px;
    display:flex;
    flex-direction:column;
    justify-content:flex-end;
    border-radius:20px 20px 0 0;

    background:
        linear-gradient(
            135deg,
            #5f1904 0%,
            #e93d3d 100%
        );

    box-shadow:
        0 8px 24px rgba(0,0,0,.08);
}

.kkn-title{
    margin:0 0 6px 0;
    color:#fff;
    font-size:28px;
    font-weight:700;
}

.kkn-subtitle{
    margin:0;
    color:rgba(255,255,255,.85);
    font-size:13px;
}

.form-label-custom{
    display:block;
    margin-bottom:8px;
    font-size:11px;
    font-weight:700;
    text-transform:uppercase;
    letter-spacing:1px;
    color:#94a3b8;
}

.form-kkn{
    height:52px;
    border:1px solid #e2e8f0;
    border-radius:14px;
    background:#f8fafc;
    padding:0 18px;
    width:100%;
}

.upload-box{
    min-height:160px;
    border:2px dashed #e2e8f0;
    border-radius:20px;
    display:flex;
    flex-direction:column;
    justify-content:center;
    align-items:center;
    gap:10px;
    cursor:pointer;
    transition:.3s;
}

.upload-box:hover{
    background:#fff7ed;
    border-color:#ef4444;
}

.btn-kkn-submit{
    min-width:140px;
    height:48px;
    border:none;
    border-radius:12px;
    background:#6d1515;
    color:white;
    font-size:13px;
    font-weight:700;
    text-transform:uppercase;
}

.btn-kkn-cancel{
    min-width:120px;
    height:48px;
    border:none;
    border-radius:12px;
    background:#e2e8f0;
    color:#334155;
}
</style>

<x-app-layout>

<div x-data="{ open:false }" class="flex h-screen bg-slate-100">

```
@include('components.sidebar')

<main class="flex-1 overflow-y-auto">

    @include('components.header')

    <div class="py-8">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <nav class="flex items-center text-sm text-gray-600 space-x-2 mb-6">
                <a href="{{ route('dashboard') }}" class="hover:text-red-600">
                    Home
                </a>

                <span>›</span>

                <span class="text-gray-500">
                    Verification
                </span>
            </nav>

            <div class="bg-white rounded-3xl overflow-hidden shadow-sm">

                <div class="kkn-header">

                    <h2 class="kkn-title">
                        Verifikasi Laporan
                    </h2>

                    <p class="kkn-subtitle">
                        Kelola dan verifikasi laporan mahasiswa KKN
                    </p>

                </div>

                <div class="p-6">

                    <div class="flex justify-between items-center mb-6">

                        <div>

                            <h3 class="text-lg font-bold text-slate-800">
                                Data Laporan
                            </h3>

                            <p class="text-sm text-slate-500">
                                Daftar laporan yang telah diupload mahasiswa
                            </p>

                        </div>

                        <button
                            onclick="openModal()"
                            class="btn-kkn-submit">

                            + Tambah Laporan

                        </button>

                    </div>

                    <div class="overflow-x-auto">

                        <table
                            id="verificationTable"
                            class="w-full border border-slate-200">

                            <thead class="bg-slate-100">

                                <tr>

                                    <th class="p-3 border">
                                        Nama File
                                    </th>

                                    <th class="p-3 border">
                                        Tanggal Upload
                                    </th>

                                    <th class="p-3 border">
                                        Jenis
                                    </th>

                                    <th class="p-3 border">
                                        Status
                                    </th>

                                    <th class="p-3 border">
                                        Catatan
                                    </th>

                                    <th class="p-3 border">
                                        Aksi
                                    </th>

                                </tr>

                            </thead>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>
```

</div>

<div id="uploadModal"
     class="fixed inset-0 z-50 hidden">

```
<div class="flex items-center justify-center min-h-screen px-4">

    <div class="fixed inset-0 bg-black bg-opacity-50"></div>

    <div class="bg-white rounded-3xl overflow-hidden shadow-xl sm:max-w-lg sm:w-full z-50">

        <div class="kkn-header">

            <h2 class="kkn-title">
                Upload Laporan Baru
            </h2>

            <p class="kkn-subtitle">
                Lengkapi data laporan dengan benar
            </p>

        </div>

        <form id="uploadForm" enctype="multipart/form-data">

            @csrf

            <div class="p-6">

                <div class="mb-5">

                    <label class="form-label-custom">
                        Jenis Laporan
                    </label>

                    <select
                        name="jenis_laporan"
                        required
                        class="form-kkn">

                        <option value="Laporan Mingguan">
                            Laporan Mingguan
                        </option>

                        <option value="Laporan Akhir">
                            Laporan Akhir
                        </option>

                        <option value="Program Kerja">
                            Program Kerja
                        </option>

                    </select>

                </div>

                <div>

                    <label
                        for="file_laporan"
                        class="upload-box">

                        <svg xmlns="http://www.w3.org/2000/svg"
                             width="50"
                             height="50"
                             fill="none"
                             stroke="#94a3b8"
                             viewBox="0 0 24 24">

                            <path stroke-linecap="round"
                                  stroke-linejoin="round"
                                  stroke-width="2"
                                  d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>

                        </svg>

                        <span>
                            Upload File PDF / JPG / PNG
                        </span>

                        <input
                            hidden
                            id="file_laporan"
                            type="file"
                            name="file_laporan"
                            required>

                    </label>

                </div>

            </div>

            <div class="bg-white p-6">

                <div class="flex justify-end gap-3">

                    <button
                        type="button"
                        onclick="closeModal()"
                        class="btn-kkn-cancel">

                        Cancel

                    </button>

                    <button
                        type="submit"
                        class="btn-kkn-submit">

                        Submit Data

                    </button>

                </div>

            </div>

        </form>

    </div>

</div>
```

</div>

</x-app-layout>

                </div>
            </div>
        </div>


    </div>



    {{-- RIGHT --}}
    <div class="col-lg-4">
    <div class="card border-0 shadow-sm radius-12 h-100">

        <div class="card-header bg-transparent">
            <div class="d-flex align-items-center justify-content-between">

                <h6 class="mb-0 fw-bold">
                    Kalender Jadwal KKN
                </h6>

                <iconify-icon
                    icon="solar:calendar-bold"
                    width="20">
                </iconify-icon>

            </div>
        </div>


        <div class="card-body p-16">

            {{-- Legend --}}
            <div class="d-flex flex-wrap gap-3 mb-3 text-sm">

                <div class="d-flex align-items-center gap-2">
                    <span class="legend-box bg-primary"></span>
                    Pembekalan
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="legend-box bg-success"></span>
                    Penerjunan
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="legend-box bg-warning"></span>
                    Monitoring
                </div>

                <div class="d-flex align-items-center gap-2">
                    <span class="legend-box bg-danger"></span>
                    Penarikan
                </div>

            </div>


            <div id="calendarKKN"></div>

        </div>
    </div>
</div>

</div>

@endsection

@section('js')


<script>
document.addEventListener('DOMContentLoaded', function () {

    const calendarEl = document.getElementById('calendarKKN');

    const calendar = new FullCalendar.Calendar(calendarEl, {

        initialView: 'dayGridMonth',
        height: 420,

        headerToolbar:{
            left:'prev,next',
            center:'title',
            right:''
        },

        events: [

            {
                title:'Pembekalan',
                start:'2026-05-05',
                color:'#0d6efd'
            },

            {
                title:'Penerjunan',
                start:'2026-05-10',
                color:'#198754'
            },

            {
                title:'Monitoring',
                start:'2026-05-20',
                color:'#ffc107'
            },

            {
                title:'Penarikan',
                start:'2026-06-10',
                color:'#dc3545'
            },

        ]

    });

    calendar.render();

});
</script>

@endsection
