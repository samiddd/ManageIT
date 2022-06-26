<!-- Sidebar -->
<div class="page-sidebar">
    <div class="logo-box"><a href="#" class="logo-text">SI-Vena</a><a href="#" id="sidebar-close"><i
                class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i
                class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Apps
            </li>
            <li class="{{ request()->is('/') ? 'active-page' : '' }}">
                <a href="/"><i class="material-icons-outlined">dashboard</i>Beranda</a>
            </li>
            <li class="{{ request()->is('organizing-committee') ? 'active-page' : '' }}">
                <a href="/organizing-committee-me"><i class="material-icons">inbox</i>Kelola Kegiatan</a>
                {{-- <ul class="sub-menu">
                    <li>
                        <a href="/planing">Planing</a>
                    </li>
                    <li>
                        <a href="/organizing">Organizing</a>
                    </li>
                    <li>
                        <a href="/controlling">Controlling</a>
                    </li>
                    <li>
                        <a href="/actuating">Actuating</a>
                    </li>
                </ul> --}}
            </li>
            <li class=" {{ request()->is('calendar') ? 'active-page' : '' }}">
                <a href="/calendar"><i class="material-icons-outlined">calendar_today</i>Kalender</a>
            </li>
            <li class="{{ request()->is('kegiatan/*') ? 'active-page' : '' }}">
                <a href="/kegiatan"><i class="material-icons-outlined">assignment</i>Acara Saya</a>
            </li>
            <li class="{{ request()->is('organizing-committee-me') ? 'active-page' : '' }}">
                <a href="/organizing-committee-me" class="active"><i class="material-icons">done</i>Tugas
                    Saya</a>
                {{-- </li>
            @if (Route::has('kegiatan.controlling.indexTask'))
                {
                <li>
                    <br><br>
                    <h5>Progress {{ $divisi->nama_divisi }}</h5>
                    <div class="progress m-b-sm">
                        <div class="progress-bar bg-success" role="progressbar" style="width: {{ $countProgress }}%;"
                            aria-valuenow="{{ $countProgress }}" aria-valuemin="0" aria-valuemax="100">
                            {{ $countProgress }}%
                        </div>
                    </div>
                </li>
                }
            @else()
                <li>.</li>
            @endif --}}

        </ul>
    </div>
</div>
