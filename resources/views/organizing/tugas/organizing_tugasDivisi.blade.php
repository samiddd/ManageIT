@extends('layout.template')

@section('title')
    Organizing Divisi
@endsection

@section('page-info')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan Saya</a></li>
                <li class="breadcrumb-item"><a href="#">Kelola Kegiatan</a></li>
                <li class="breadcrumb-item"><a href="#">Organizing</a></li>
                <li class="breadcrumb-item active" aria-current="page"><a href="#">{{ $divisi->nama_divisi }}</a>
                </li>
            </ol>
        </nav>
    </div>
    </div>
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills d-flex justify-content-between align-items-center ">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tugas yang datang</a>
                            </li>
                            @if ($divisi->id_user != 0)
                                Penanggung Jawab : {{ $pic->nama_user }}
                            @else
                                <li class="nav-item">
                                    <form action="/kegiatan/kelola/{{ $divisi->id_divisi }}/organizing/updatepic"
                                        method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="form-group d-flex">
                                            <select name="id_user" class="form-control" id="">
                                                <option value="" selected disabled>Pilih Koordinator Divisi</option>
                                                @foreach ($user as $user)
                                                    <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
                                                @endforeach
                                            </select>
                                            <button type="submit" class="btn btn-secondary">Pilih</button>
                                        </div>
                                    </form>

                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="#" class="btn btn-success justify-content-end nav-link justify-content-end"
                                    data-toggle="modal" data-target="#modalTambah">+
                                    Tambah Tugas</a>
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
                                        <th scope="col">Tenggat Waktu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    {{-- {{ dd($tugas) }} --}}
                                    @foreach ($tugas as $data)
                                        <tr>
                                            {{-- {{ dd($data->id_prioritas == '4') }} --}}
                                            <td>{{ $data->nama_tugas }}</td>
                                            @if ($data->id_prioritas == '1')
                                                <td><span class="badge badge-danger">Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '2')
                                                <td><span class="badge badge-warning">Penting dan Tidak Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '3')
                                                <td><span class="badge badge-success">Tidak Penting dan Mendesak</span></td>
                                            @elseif ($data->id_prioritas == '4')
                                                <td><span class="badge badge-info">Tidak Penting dan Tidak
                                                        Mendesak</span>
                                                </td>
                                            @endif


                                            {{-- {{ dd($data) }} --}}
                                            <td> <a href="https://api.whatsapp.com/send/?phone={{ $data->whatsapp }}&text=apakah pengerjaan {{ $data->nama_tugas }} sudah selesai ? &app_absent=0"
                                                    target="_blank">{{ $data->nama_user }}</a></td>
                                            <td>{{ $data->tanggal_tugas }} - {{ $data->waktu_tugas }}</td>
                                            <td class="d-flex align-items-center mr-2">
                                                <a href="#" class="btn btn-success btn-xs mr-2"><span
                                                        data-toggle="modal"
                                                        data-target="#modalEdit-{{ $data->id_tugas }}"
                                                        class="material-icons">edit</span></a>

                                                {{-- <button data-toggle="modal" data-target="#modalDelete-1">
                                                    <span class="material-icons">delete</span>
                                                </button> --}}

                                                <form
                                                    action="/kegiatan/kelola/{{ $data->id_tugas }}/organizing/deletetugas"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button class="btn btn-danger btn-xs" type="submit">
                                                        <span class="material-icons">delete</span>
                                                    </button>
                                                </form>
                                            </td>

                                        </tr>

                                        {{-- modal edit --}}
                                        <div class="modal fade" id="modalEdit-{{ $data->id_tugas }}" tabindex="-1"
                                            role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Edit Divisi</h4>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>

                                                    <form
                                                        action="/kegiatan/kelola/{{ $data->id_tugas }}/organizing/edittugas"
                                                        method="POST">
                                                        @csrf
                                                        <div class="modal-body mx-3">
                                                            @include('organizing.tugas.modal_editTugas')
                                                            <div
                                                                class="modal-footer d-flex justify-content-center form-group">
                                                                <button class="btn btn-secondary"
                                                                    data-dismiss="modal">Tutup</button>
                                                                <button type="submit" class="btn btn-primary">Edit</button>
                                                            </div>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end modal edit --}}
                                    @endforeach
                                </tbody>

                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- modal tambah --}}
    <div class="modal fade" id="modalTambah" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header text-center">
                    <h4 class="modal-title w-100 font-weight-bold">Tambah Kegiatan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/kegiatan/kelola/{{ $divisi->id_divisi }}/organizing/addtugas" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mx-3">

                        @include('organizing.tugas.modal_tambahTugas')
                        <div class="modal-footer d-flex justify-content-center form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- end modal tambah --}}

    @foreach ($tugas as $data)
        {{-- modal hapus --}}
        <div class="modal fade" id="modalDelete-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-sm">
                <div class="modal-content bg-danger">
                    <div class="modal-header">
                        <h4 class="modal-title">Hapus data {{ $data->nama_tugas }}
                        </h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p>Apakah anda yakin ingin menghapus data?</p>
                    </div>
                    {{-- <div class="modal-footer justify-content-between">
                        <form action="/kegiatan/kelola/{{ $data->id_tugas }}/organizing/deletetugas" method="POST">
                            @csrf
                            @method('delete')
                            <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                            <button class="btn btn-outline-light" type="submit">Ya, Saya
                                yakin</button>
                        </form>


                    </div> --}}
                </div>
            </div>
        </div>
        {{-- end modal hapus --}}
    @endforeach
@endsection
