@extends('layout.template')

@section('title')
    Calendarr
@endsection

@section('page-info')
    breadcrumbbb
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">Kalender Kerja {{ $kegiatan->nama_kegiatan }}</div>
                        <div id='calendar'></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/core/main.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/interaction//main.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/daygrid/main.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/timegrid/main.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/plugins/fullcalendar/packages/bootstrap//main.min.js"></script>
    <script src="{{ asset('assets/') }}../../assets/js/connect.min.js"></script>
    {{-- <script src="../../assets/js/pages/calendar.js"></script> --}}

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var calendarEl = document.getElementById('calendar');
            var tugas = @json($events);
            console.log(tugas);
            var calendar = new FullCalendar.Calendar(calendarEl, {
                plugins: ['interaction', 'dayGrid', 'timeGrid', 'bootstrap'],
                timeZone: 'UTC',
                header: {
                    left: 'title',
                    center: 'dayGridMonth,monthGridYear',
                    right: 'prev,next'
                },
                editable: true,
                eventLimit: true, // when too many events in a day, show the popover

                events: tugas,

                // events: [{
                //     title: 'annjj',
                //     start: '2022-06-22'
                // }],
                themeSystem: 'bootstrap'
            });

            calendar.render();
        });
    </script>
@endsection
