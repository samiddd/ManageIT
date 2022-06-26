@extends('layout.template')

@section('title')
    Organizing Panitia
@endsection

@section('page-info')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan Saya</a></li>
                <li class="breadcrumb-item"><a href="#">Kelola Kegiatan</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Organizing</a></li>
            </ol>
        </nav>
    </div>
    </div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-transparent file-list recent-files">
                <div class="card-body">
                    <h5 class="card-title">Controlling Panitia</h5>
                    <div class="row justify-content-end">
                        <a href="/kegiatan/kelola/{{ $kegiatan->id_kegiatan }}/calendar"><i
                                class="material-icons-outlined">calendar_today</i>Kalender</a>
                    </div>
                </div>
            </div>



            <div class="row">
                @foreach ($divisi as $divisi)
                    <div class="col-lg-6 col-xl-2">
                        <div class="card file photo">
                            <div class="card-header file-icon">

                                <a href="/kegiatan/kelola/{{ $divisi->id_divisi }}/controlling/panitia"><i
                                        class="material-icons">groups</i>
                            </div>
                            <div class="card-body file-info">
                                <p>{{ "$divisi->nama_divisi" }}</p>
                                <br>
                                <div class="progress">
                                    <div class="progress-bar" role="progressbar" style="width: {{ $divisi->progress }}%;"
                                        aria-valuemin="0" aria-valuemax="100">
                                        {{ $divisi->progress }}%</div>
                                </div>
                            </div></a>
                        </div>
                    </div>
                @endforeach

                {{-- @foreach ($data->divisi as $data) --}}
            </div>

        </div>
    </div>
@endsection
