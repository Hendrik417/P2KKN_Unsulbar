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

<div class="row gy-4">

    {{-- LEFT --}}
    <div class="col-lg-8">

        {{-- Welcome Card --}}
        <div class="card border-0 shadow-sm radius-12 bg-primary-50 mb-4">
            <div class="card-body p-24">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div class="card border-0 shadow-sm radius-12 overflow-hidden">

    {{-- Header --}}
    <div class="kkn-header">
        <h2 class="kkn-title">
            Formulir Pendaftaran KKN
        </h2>

        <p class="kkn-subtitle">
            Lengkapi data diri anda dengan benar
        </p>
    </div>


    {{-- Form --}}
    <form action="{{ route('pendaftaran.store')}}" method="POST" enctype="multipart/form-data">

        @csrf

        <div class="card-body p-4">

            <div class="row g-4">


                {{-- Nama --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Nama Mahasiswa
                    </label>

                    <input
                        type="text"
                        name="nama_lengkap"
                        class="form-control form-kkn"
                        placeholder="Masukkan nama">
                </div>


                {{-- NIM --}}
                <div class="col-md-6">
                    <label class="form-label-custom">
                        NIM
                    </label>

                    <input
                        type="text"
                        name="nim"
                        class="form-control form-kkn"
                        placeholder="Masukkan NIM">
                </div>


                {{-- JK --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Jenis Kelamin
                    </label>

                    <select
                        name="jenis_kelamin"
                        class="form-select form-kkn">

                        <option value="">
                            Pilih Jenis Kelamin
                        </option>

                        <option value="L">
                            Laki-laki
                        </option>

                        <option value="P">
                            Perempuan
                        </option>

                    </select>
                </div>

                {{-- Tempat Lahir --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Tempat Lahir
                    </label>

                    <input
                        type="text"
                        name="tempat_lahir"
                        class="form-control form-kkn"
                        placeholder="Masukkan tempat lahir">
                </div>

                {{-- Tanggal Lahir --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Tanggal Lahir
                    </label>

                    <input
                        type="date"
                        name="tanggal_lahir"
                        class="form-control form-kkn">
                </div>

                {{-- HP --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Nomor Handphone
                    </label>

                    <input
                        type="text"
                        name="no_hp"
                        class="form-control form-kkn"
                        placeholder="08...">
                </div>

                {{-- Alamat --}}
                <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        NIK
                    </label>

                    <input
                        type="text"
                        name="nik"
                        class="form-control form-kkn"
                        placeholder="Masukkan NIK">
                </div>

                {{-- Alamat --}}
                <div class="col-12 mb-4">
                    <label class="form-label-custom">
                        Alamat
                    </label>

                    <textarea
                        name="alamat"
                        rows="4"
                        class="form-control form-kkn"
                        placeholder="Masukkan alamat lengkap"></textarea>
                </div>

                


                {{-- Fakultas --}}
                {{-- <div class="col-md-6">
                    <label class="form-label-custom">
                        Fakultas
                    </label>

                    <select
                        name="fakultas"
                        class="form-select form-kkn">

                        <option value="">
                            Pilih Fakultas
                        </option>

                    </select>
                </div> --}}


                {{-- Prodi --}}
                {{-- <div class="col-md-6 mb-4">
                    <label class="form-label-custom">
                        Prodi
                    </label>

                    <select
                        name="prodi"
                        class="form-select form-kkn">

                        <option value="">
                            Pilih Prodi
                        </option>

                    </select>
                </div> --}}


                {{-- Jenis KKN --}}
                {{-- <div class="col-12 mb-4">
                    <label class="form-label-custom">
                        Jenis KKN
                    </label>

                    <select
                        name="jenis_kkn"
                        class="form-select form-kkn">

                        <option value="Reguler">
                            Reguler
                        </option>

                        <option value="MBKM">
                            MBKM
                        </option>

                    </select>
                </div> --}}


                {{-- Upload --}}
                {{-- <div class="col-md-6">

                    <label
                        for="file1"
                        class="upload-box">

                        <input
                            type="file"
                            name="surat_pernyataan"
                            id="file1"
                            hidden>

                        <iconify-icon
                            icon="ph:file-pdf"
                            width="40">
                        </iconify-icon>

                        <span>
                            Surat Pernyataan (PDF)
                        </span>

                    </label>

                </div> --}}



                {{-- <div class="col-md-6">

                    <label
                        for="file2"
                        class="upload-box">

                        <input
                            type="file"
                            name="khs"
                            id="file2"
                            hidden>

                        <iconify-icon
                            icon="ph:file-doc"
                            width="40">
                        </iconify-icon>

                        <span>
                            KHS Terakhir (PDF)
                        </span>

                    </label>

                </div> --}}

            </div>

        </div>


        {{-- Footer --}}
        <div class="card-footer bg-white border-0 p-4">

            <div class="d-flex justify-content-end gap-3">

                <button
                    type="button"
                    class="btn-kkn-cancel mr-3">

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