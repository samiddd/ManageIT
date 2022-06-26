@extends('layout.template')

@section('title')
    Controlling {{ $divisi->nama_divisi }}
@endsection

@section('page-info')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan Saya</a></li>
                <li class="breadcrumb-item"><a href="#">Kelola Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="#">Controlling</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $divisi->nama_divisi }}</a></li>
            </ol>
        </nav>
    </div>
    </div>
@endsection

@section('content')
    {{-- tabel upcoming task --}}
    <div class="main-wrapper">
        <h5>Progress {{ $divisi->nama_divisi }} ({{ $countTaskDone }}/{{ $allTask }})</h5>
        <div class="progress m-b-sm">
            <div class="progress-bar bg-success" role="progressbar" style="width: {{ $countProgress }}%;"
                aria-valuenow="{{ $countProgress }}" aria-valuemin="0" aria-valuemax="100">
                {{ $countProgress }}%
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tugas yang datang</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Penanggung Jawab</th>
                                        <th scope="col">Tenggat Waktu Tersisa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($upcomingTask as $data)
                                        <tr>
                                            <td>{{ $data->nama_tugas }}</td>
                                            @if ($data->id_prioritas == '1')
                                                <td><del><span class="badge badge-danger">Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '2')
                                                <td><span class="badge badge-warning">Penting dan Tidak Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '3')
                                                <td><span class="badge badge-success">Tidak Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '4')
                                                <td><span class="badge badge-info">Tidak Penting dan Tidak
                                                        Mendesak</span>
                                                </td>
                                            @endif
                                            <td> <a href="https://api.whatsapp.com/send/?phone={{ $data->nomor_whatsapp }}&text=Hai {{ $data->nama_user }}, gimana nih progress pengerjaan {{ $data->nama_tugas }}? &app_absent=0"
                                                    target="_blank">{{ $data->nama_user }}</a></td>

                                            <td>
                                                <p class="text-warning"><i class="material-icons">alarm</i>
                                                    {{ \Carbon\Carbon::now()->diffInDays($data->tanggal_tugas, false) }}
                                                    Hr
                                                    {{ \Carbon\Carbon::now()->diffInHours($data->waktu_tugas) }} Jam
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#"><span data-toggle="modal"
                                                        data-target="#modalSelesai-{{ $data->id_tugas }}"
                                                        class="material-icons">done</span></a>


                                            </td>

                                        </tr>

                                        <div class="modal fade" id="modalSelesai-{{ $data->id_tugas }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tugas Selesai</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="/kegiatan/kelola/{{ $data->id_tugas }}/controlling/tugasselesai"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin pengerjaan {{ $data->nama_tugas }} sudah
                                                            selesai?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ya, saya
                                                                yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- tutup tabel upcoming task --}}

    {{-- table selesai --}}
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <h5><span class="badge badge-secondary">Tugas Selesai</span></h5>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table id="complex-header" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Penanggung Jawab</th>
                                        <th scope="col">Tenggat Waktu Tersisa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($taskDone as $data)
                                        <tr>
                                            <td><del>{{ $data->nama_tugas }}</del></td>
                                            @if ($data->id_prioritas == '1')
                                                <td><span class="badge badge-secondary"><del>Penting dan
                                                            Mendesak</del></span>
                                                </td>
                                            @elseif ($data->id_prioritas == '2')
                                                <td><span class="badge badge-secondary"><del>Penting dan Tidak
                                                            Mendesak</del></span></td>
                                            @elseif ($data->id_prioritas == '3')
                                                <td><span class="badge badge-secondary"><del>Tidak Penting dan
                                                            Mendesak</del></span></td>
                                            @elseif ($data->id_prioritas == '4')
                                                <td><del><span class="badge badge-secondary"><del>Tidak Penting dan Tidak
                                                                Mendesak</span></del>
                                                </td>
                                            @endif
                                            <td><del>{{ $data->nama_user }}</del></td>

                                            <td>
                                                <p>
                                                    <del>{{ \Carbon\Carbon::now()->diffInDays($data->tanggal_tugas, false) }}
                                                        Hr
                                                        {{ \Carbon\Carbon::now()->diffInHours($data->waktu_tugas) }}
                                                        Jam</del>
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#"><span data-toggle="modal"
                                                        data-target="#modalUndo-{{ $data->id_tugas }}"
                                                        class="material-icons">undo</span></a>
                                            </td>

                                        </tr>
                                        <div class="modal fade" id="modalUndo-{{ $data->id_tugas }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tugas Batal
                                                            Selesai</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="/kegiatan/kelola/{{ $data->id_tugas }}/controlling/tugasundo"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin {{ $data->nama_tugas }} batal
                                                            selesai?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ya, saya
                                                                yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end table selesai --}}

    {{-- tabel upcoming task --}}
    {{-- <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tugas yang datang</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <thead class="thead-success">
                                    <tr>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Penanggung Jawab</th>
                                        <th scope="col">Tenggat Waktu Tersisa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($upcomingTask as $data)
                                        <tr>
                                            <td>{{ $data->nama_tugas }}</td>
                                            @if ($data->id_prioritas == '1')
                                                <td><del><span class="badge badge-danger">Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '2')
                                                <td><span class="badge badge-warning">Penting dan Tidak Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '3')
                                                <td><span class="badge badge-success">Tidak Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '4')
                                                <td><span class="badge badge-info">Tidak Penting dan Tidak
                                                        Mendesak</span>
                                                </td>
                                            @endif
                                            <td> <a href="https://api.whatsapp.com/send/?phone={{ $data->nomor_whatsapp }}&text=Hai {{ $data->nama_user }}, gimana nih progress pengerjaan {{ $data->nama_tugas }}? &app_absent=0"
                                                    target="_blank">{{ $data->nama_user }}</a></td>

                                            <td>
                                                <p class="text-warning"><i class="material-icons">alarm</i>
                                                    {{ \Carbon\Carbon::now()->diffInDays($data->tanggal_tugas, false) }}
                                                    Hr
                                                    {{ \Carbon\Carbon::now()->diffInHours($data->waktu_tugas) }} Jam
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#"><span data-toggle="modal"
                                                        data-target="#modalSelesai-{{ $data->id_tugas }}"
                                                        class="material-icons">done</span></a>


                                            </td>

                                        </tr>
                                        <div class="modal fade" id="modalSelesai-{{ $data->id_tugas }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tugas Selesai</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="/kegiatan/kelola/{{ $data->id_tugas }}/controlling/tugasselesai"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin pengerjaan {{ $data->nama_tugas }} sudah
                                                            selesai?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ya, saya
                                                                yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}

    {{-- tutup tabel upcoming task --}}

    {{-- table selesai --}}
    {{-- <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <h5><span class="badge badge-secondary">Tugas yang telah selesai</span></h5>
                            </li>

                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table" style="width:100%">
                                <thead class="thead-light">
                                    <tr>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Penanggung Jawab</th>
                                        <th scope="col">Tenggat Waktu Tersisa</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($taskDone as $data)
                                        <tr>
                                            <td><del>{{ $data->nama_tugas }}</del></td>
                                            @if ($data->id_prioritas == '1')
                                                <td><span class="badge badge-secondary"><del>Penting dan
                                                            Mendesak</del></span>
                                                </td>
                                            @elseif ($data->id_prioritas == '2')
                                                <td><span class="badge badge-secondary"><del>Penting dan Tidak
                                                            Mendesak</del></span></td>
                                            @elseif ($data->id_prioritas == '3')
                                                <td><span class="badge badge-secondary"><del>Tidak Penting dan
                                                            Mendesak</del></span></td>
                                            @elseif ($data->id_prioritas == '4')
                                                <td><del><span class="badge badge-secondary"><del>Tidak Penting dan Tidak
                                                                Mendesak</span></del>
                                                </td>
                                            @endif
                                            <td><del>{{ $data->nama_user }}</del></td>

                                            <td>
                                                <p>
                                                    <del>{{ \Carbon\Carbon::now()->diffInDays($data->tanggal_tugas, false) }}
                                                        Hr
                                                        {{ \Carbon\Carbon::now()->diffInHours($data->waktu_tugas) }}
                                                        Jam</del>
                                                </p>
                                            </td>
                                            <td>
                                                <a href="#"><span data-toggle="modal"
                                                        data-target="#modalUndo-{{ $data->id_tugas }}"
                                                        class="material-icons">undo</span></a>


                                            </td>

                                        </tr>

                                        <div class="modal fade" id="modalUndo-{{ $data->id_tugas }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Tugas Batal
                                                            Selesai</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <i class="material-icons">close</i>
                                                        </button>
                                                    </div>
                                                    <form
                                                        action="/kegiatan/kelola/{{ $data->id_tugas }}/controlling/tugasundo"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body">
                                                            Apakah anda yakin {{ $data->nama_tugas }} batal
                                                            selesai?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-dismiss="modal">Batal</button>
                                                            <button type="submit" class="btn btn-primary">Ya, saya
                                                                yakin</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> --}}
    {{-- end table selesai --}}
@endsection
