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
                <li class="breadcrumb-item active" aria-current="page"><a href="#">Actuating</a></li>
            </ol>
        </nav>
    </div>
    </div>
@endsection

@section('content')
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-lg-12">
                <div class="card card-transactions">
                    <div class="card-header">
                        <ul class="nav nav-pills card-header-pills">
                            <li class="nav-item">
                                <a class="nav-link active" href="#">Tugas yang datang</a>
                            </li>
                            {{-- <li class="nav-item">
                                <a class="nav-link" href="#">Tugas terlambat</a>
                            </li> --}}
                            <li class="nav-item">
                                <a href="#" class="btn btn-success justify-content-end nav-link" data-toggle="modal"
                                    data-target="#modalTambah">+
                                    Tambah Divisi</a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <h5 class="card-title">Tugas Saya<a href="#" class="card-title-helper blockui-transactions"><i
                                    class="material-icons">refresh</i></a></h5>
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Tugas</th>
                                        <th scope="col">Prioritas</th>
                                        <th scope="col">Tenggat Waktu</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        @foreach ($tugas as $data)
                                            <td> {{ $data->nama_tugas }}</td>
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
                                            <td>{{ $data->tanggal_tugas }} - {{ $data->waktu_tugas }}</td>
                                            <td>
                                                <a href="#"><span data-toggle="modal"
                                                        data-target="#modalEdit-{{ $data->id_actuating }}"
                                                        class="material-icons">edit</span></a>

                                                {{-- <button data-toggle="modal" data-target="#modalDelete-1">
                                                    <span class="material-icons">delete</span>
                                                </button> --}}

                                                <form
                                                    action="/kegiatan/kelola/{{ $data->id_actuating }}/actuating/deletetugas"
                                                    method="POST">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit">
                                                        <span class="material-icons">delete</span>
                                                    </button>
                                                </form>
                                            </td>
                                    </tr>

                                    {{-- modal edit --}}
                                    <div class="modal fade" id="modalEdit-{{ $data->id_actuating }}" tabindex="-1"
                                        role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header text-center">
                                                    <h4 class="modal-title w-100 font-weight-bold">Edit Tugas Actuating</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>

                                                <form
                                                    action="/kegiatan/kelola/{{ $data->id_actuating }}/actuating/edittugas"
                                                    method="POST">
                                                    @csrf
                                                    <div class="modal-body mx-3">
                                                        @include('actuating.modal_editTugas')
                                                        <div class="modal-footer d-flex justify-content-center form-group">
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
                <form action="/kegiatan/kelola/{{ $data->id_kegiatan }}/actuating/addtugas" method="POST"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body mx-3">

                        @include('actuating.modal_tambahTugas')
                        <div class="modal-footer d-flex justify-content-center form-group">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                        </div>

                    </div>
                </form>
            </div>

        </div>
    </div>
    {{-- end modal tambah --}}

    {{-- @foreach ($tugas as $data) --}}
    {{-- modal hapus --}}
    {{-- <div class="modal fade" id="modalDelete-1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
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
    {{-- </div>
            </div>
        </div> --}}
    {{-- end modal hapus --}}
    {{-- @endforeach --}}
@endsection
