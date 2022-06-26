  @extends('layout.template')

  @section('title')
      Kegiatan Saya
  @endsection

  @section('page-info')
      <div class="page-info">
          <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="#">Apps</a></li>
                  <li class="breadcrumb-item active" aria-current="page">Kegiatan Saya</li>
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
                      <h5 class="card-title">Kegiatan Saya</h5>

                      <div class="row justify-content-start">
                          @if (session('pesan'))
                              <div class="alert alert-success" role="alert">
                                  {{ session('pesan') }}
                              </div>
                          @endif
                      </div>

                      <div class="row justify-content-end">
                          <a href="#" class="btn btn-outline-dark" style="margin: 20px" data-toggle="modal"
                              data-target="#modalTambah">+ Tambah Acara</a>
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

                                  <form action="/kegiatan/add" method="POST" enctype="multipart/form-data">
                                      @csrf
                                      <div class="modal-body mx-3">

                                          @include('kegiatan.modal_tambah')
                                          <div class="modal-footer d-flex justify-content-center form-group">
                                              <button type="submit" class="btn btn-primary">Tambah</button>
                                          </div>

                                      </div>
                              </div>

                          </div>
                      </div>
                  </div>
                  </form>


              </div>

              <div class="row">
                  @foreach ($kegiatan as $data)
                      <div class="col-lg-3">
                          <div class="card text-center">
                              <div class="card-body">
                                  <h5 class="card-title" style="font-size: larger;">{{ $data->nama_kegiatan }}</h5>
                                  <p class="card-text">Status : Ketua Panitia</p>

                                  <a href="kegiatan/kelola/{{ $data->id_kegiatan }}" class="btn btn-info">Kelola
                                      Kegiatan </a>
                                  <br>

                                  <div class="">
                                      <button data-toggle="modal" data-target="#modalEdit-{{ $data->id_kegiatan }}"
                                          class="btn btn-success" style="transform: scale(0.8)"><i
                                              class="fa fa-edit"></i></button></a>
                                      <button data-toggle="modal" data-target="#delete{{ $data->id_kegiatan }}"
                                          class="btn btn-danger" style="transform: scale(0.8)"><i
                                              class="fa fa-trash"></i></button></a>
                                  </div>
                              </div>
                              <div class="card-footer text-muted">
                                  {{ $data->tanggal_kegiatan }}
                              </div>
                          </div>
                      </div>
                  @endforeach

                  @foreach ($kegiatan as $data)
                      <div class="modal fade" id="modalEdit-{{ $data->id_kegiatan }}" tabindex="-1" role="dialog"
                          aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                  <div class="modal-header text-center">
                                      <h4 class="modal-title w-100 font-weight-bold">Edit Kegiatan</h4>
                                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                      </button>
                                  </div>

                                  <form action="/kegiatan/edit/{{ $data->id_kegiatan }}" method="POST"
                                      enctype="multipart/form-data">
                                      @csrf
                                      <div class="modal-body mx-3">

                                          @include('kegiatan.modal_edit')
                                          <div class="modal-footer d-flex justify-content-center form-group">
                                              <button class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                              <button type="submit" class="btn btn-primary">Edit</button>
                                          </div>

                                      </div>
                              </div>

                          </div>
                      </div>
              </div>
              </form>


          </div>
          @endforeach

          @foreach ($kegiatan as $data)
              <div class="modal modal-danger fade" id="delete{{ $data->id_kegiatan }}">
                  <div class="modal-dialog modal-sm">
                      <div class="modal-content bg-danger">
                          <div class="modal-header">
                              <h4 class="modal-title">Hapus data {{ $data->nama_kegiatan }}</h4>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                              </button>
                          </div>
                          <div class="modal-body">
                              <p>Apakah anda yakin ingin menghapus data?</p>
                          </div>
                          <div class="modal-footer justify-content-between">
                              <button type="button" class="btn btn-outline-light" data-dismiss="modal">Tidak</button>
                              <a href="/kegiatan/delete/{{ $data->id_kegiatan }}" class="btn btn-outline-light">Ya,
                                  saya
                                  yakin
                              </a>
                          </div>
                      </div>
                      <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
              </div>
          @endforeach
      @endsection
