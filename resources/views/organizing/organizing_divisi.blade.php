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
                    <h5 class="card-title">Mengelola Panitia</h5>

                    <div class="row justify-content-end">
                        <a href="#" class="btn btn-success justify-content-end" style="margin: 10px; margin: 20px;"
                            data-toggle="modal" data-target="#modalTambah">+ Tambah Divisi</a>
                    </div>

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
                                <form action="/kegiatan/kelola/{{ $kegiatan->id_kegiatan }}/organizing/adddivisi"
                                    method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body mx-3">

                                        @include('organizing.modal_tambah')
                                        <div class="modal-footer d-flex justify-content-center form-group">
                                            <button type="submit" class="btn btn-primary">Tambah</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>

            </div>



            <div class="row">
                @foreach ($divisi as $divisi)
                    <div class="col-lg-6 col-xl-2">
                        <div class="card file photo">
                            <div class="file-options dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false"><i class="material-icons">more_vert</i></a>
                                <div class="dropdown-menu dropdown-menu-right">
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#modalEdit-{{ $divisi->id_divisi }}">Edit</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal"
                                        data-target="#delete-{{ $divisi->id_divisi }}">Delete</a>
                                </div>
                            </div>
                            <div class="card-header file-icon">

                                <a href="/kegiatan/kelola/{{ $divisi->id_divisi }}/organizing/panitia"><i
                                        class="material-icons">groups</i>
                            </div>
                            <div class="card-body file-info">
                                <p>{{ "$divisi->nama_divisi" }}</p>
                            </div></a>
                        </div>
                    </div>


                    <div class="modal fade" id="modalEdit-{{ $divisi->id_divisi }}" tabindex="-1" role="dialog"
                        aria-labelledby="myModalLabel" aria-hidden="true">

                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-center">
                                    <h4 class="modal-title w-100 font-weight-bold">Edit Divisi</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>

                                <form action="/kegiatan/kelola/{{ $divisi->id_divisi }}/organizing/update" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="modal-body mx-3">
                                        @include('organizing.modal_edit')
                                        <div class="modal-footer d-flex justify-content-center form-group">
                                            <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                            <button type="submit" class="btn btn-primary">Edit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="modal modal-danger fade" id="delete-{{ $divisi->id_divisi }}">
                        <div class="modal-dialog modal-sm">
                            <div class="modal-content bg-danger">
                                <div class="modal-header">
                                    <h4 class="modal-title">Hapus data {{ $divisi->nama_divisi }}</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <p>Apakah anda yakin ingin menghapus data?</p>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-outline-light"
                                        data-dismiss="modal">Tidak</button>
                                    <a href="/kegiatan/kelola/{{ $divisi->id_divisi }}/organizing/delete"
                                        class="btn btn-outline-light">Ya,
                                        saya yakin </a>

                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

                {{-- @foreach ($data->divisi as $data) --}}
            </div>

        </div>
    </div>




    {{-- @endforeach --}}


    </div>
    </div>
@endsection
