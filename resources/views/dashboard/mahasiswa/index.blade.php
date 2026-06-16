@extends('dashboard.mahasiswa.layouts.app')
@section('content')
<style>
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
}

.fc .fc-button{
    padding:4px 8px;
    font-size:12px;
}

.fc-event{
    border:none !important;
    padding:2px;
    border-radius:6px;
    font-size:11px;
}
</style>

<div class="row gy-4">

    {{-- LEFT --}}
    <div class="col-lg-8">

        {{-- Welcome Card --}}
        <div class="card border-0 shadow-sm radius-12 bg-primary-50 mb-4">
            <div class="card-body p-24">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h4 class="mb-8 fw-bold text-primary-600">
                            Selamat Datang di Menu Mahasiswa, {{ auth()->user()->name }}!
                        </h4>

                        <p class="mb-0 text-secondary-light">
                            Kelola data mahasiswa dengan mudah dan cepat.
                        </p>
                    </div>

                    <div class="d-none d-md-block">
                        <iconify-icon
                            icon="bxs:data"
                            width="56"
                            class="text-primary-600 opacity-50">
                        </iconify-icon>
                    </div>
                </div>
            </div>
        </div>


        {{-- Statistik --}}
        <div class="card border-0 shadow-sm radius-12 bg-primary-50 mb-4">
            <div class="card-body p-24">
                <div class="d-flex align-items-center justify-content-between flex-wrap gap-3">
                    <div>
                        <h4 class="mb-8 fw-bold text-primary-600">
                            Riwayat Laporan
                        </h4>

                        <p class="mb-0 text-secondary-light">
                            Kelola Laporan Mahasiswa.
                        </p>
                    </div>

                    <div class="d-none d-md-block">
                        <iconify-icon
                            icon="bxs:data"
                            width="56"
                            class="text-primary-600 opacity-50">
                        </iconify-icon>
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