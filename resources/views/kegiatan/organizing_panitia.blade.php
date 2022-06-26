@extends('layout.template')

@section('title')
    Tugas Saya | SI-Vena
@endsection
@section('page-info')
<div class="page-info">
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="#">Apps</a></li>
        <li class="breadcrumb-item active" aria-current="page">Tugas Saya</li>
    </ol>
</nav>
</div>
@endsection

@section('content')
<div class="card-body">
    <h5 class="card-title">Tugas Saya<a href="#" class="card-title-helper blockui-transactions"><i class="material-icons">refresh</i></a></h5>
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">Nama Kegiatan</th>
                    <th scope="col">Tugas</th>
                    <th scope="col">Prioritas</th>
                    <th scope="col">Tenggat Waktu</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Sosialisasi Prodi</td>
                    <td>Pembuatan Poster</td>
                    <td><span class="badge badge-warning">Cukup Mendesak</span></td>
                    <td>1 jam 15 Menit</td>
                    <td><a href="#"><span class="material-icons">edit</span></a> <a href="#"><span class="material-icons">delete</span></a></td>
                </tr>
                <tr>
                    <td>Sosialisasi Prodi</td>
                    <td>Mengirimkan Undangan</td>
                    <td><span class="badge badge-warning">Cukup Mendesak</span></td>
                    <td>1 jam 15 Menit</td>
                    <td><a href="#"><span class="material-icons">edit</span></a> <a href="#"><span class="material-icons">delete</span></a></td>
                </tr>
                <tr>
                    <td>Webinar Flutter</td>
                    <td>Briefing Pemateri</td>
                    <td><span class="badge badge-warning">Cukup Mendesak</span></td>
                    <td>1 jam 15 Menit</td>
                    <td><a href="#"><span class="material-icons">edit</span></a> <a href="#"><span class="material-icons">delete</span></a></td>
               </tr>
                <tr>
                    <td>Webinar Flutter</td>
                    <td>Membuat Form Absen</td>
                    <td><span class="badge badge-warning">Cukup Mendesak</span></td>
                    <td>1 jam 15 Menit</td>
                    <td><a href="#"><span class="material-icons">edit</span></a> <a href="#"><span class="material-icons">delete</span></a></td>
                </tr>
            </tbody>
        </table> 
    </div>     
</div>
@endsection