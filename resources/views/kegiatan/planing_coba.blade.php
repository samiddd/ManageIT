@extends('layout.template')

@section('title')
    Planning Kegiatan 
@endsection

@section('page-info')
<div class="page-info">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="/index">Apps</a></li>
            <li class="breadcrumb-item"><a href="/kegiatan">Kegiatan Saya</a></li>
            <li class="breadcrumb-item"><a href="/kegiatan/kelola">Kelola Kegiatan</a></li>
            <li class="breadcrumb-item active" aria-current="page">Planning</li>
        </ol>
    </nav>
    </div>
</div>
@endsection
{{-- @dd($kegiatan) --}}
@section('content')
<div class="main-wrapper">
    <div class="row">
        <div class="col-md-12">
            <div class="page-title">
                <h2>Planning</h2>
                <p class="page-desc">Sekarang kita akan membuat perencanaan, ditahap ini kita perlu menentukan tujuan dan sasaran yang ingin di capai dan menetapkan jalan dan sumber yang diperlukan
                    untuk mencapai tujuan seefektif dan seefisien mungkin. Tujuan juga akan memudahkan kita dalam pelaksanaan program nantinya karena adanya tujuan membuat kita bisa fokus melakukan apa yang seharusnya di lakukan berdasarkan capaian yang di inginkan di awal.</p>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Yuk pahami tentang kegiatan ini!</h5>
                    
                    <form action="/kegiatan/kelola/{{$kegiatan->id_kegiatan}}/planning/updateorinsert" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaKegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="namaKegiatan" value="{{ $kegiatan->nama_kegiatan }}" readonly>
                                    <input type="hidden" value="{{ $kegiatan->id_kegiatan}}" name="id_kegiatan" id="">
        
                                </div>
                                <div class="form-group">
                                    <label for="latarBelakangKegiatan">Latar Belakang Kegiatan</label>
                                    <textarea name="latar_belakang_kegiatan" class="form-control" id="latarBelakangKegiatan" rows="3"> {{old('latar_belakang_kegiatan')}} </textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsiKegiatan">Deskripsi Kegiatan</label>
                                    <textarea name="deskripsi_kegiatan" class="form-control" id="deskripsiKegiatan" rows="3" placeholder="Masukkan deskripsi kegiatan"> {{old('deskripsi_kegiatan')}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tujuanKegiatan">Tujuan Kegiatan</label>
                                    <input name="tujuan_kegiatan" type="text" class="form-control" id="tujuanKegiatan" value="{{old('tujuan_kegiatan')}}"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sasaranKegiatan">Sasaran Kegiatan</label>
                                    <input name="sasaran_kegiatan" type="text" class="form-control" id="sasaranKegiatan" rows="" value="{{old('sasaran_kegiatan')}}">
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggalWaktuKegiatan">Tanggal Kegiatan</label>
                                            <input type="date"  class="form-control" id="tanggalKegiatan" value="{{ $kegiatan->tanggal_kegiatan}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggalWaktuKegiatan">Waktu Kegiatan</label>
                                            <input type="time"  class="form-control" id="waktuKegiatan" value="{{ $kegiatan->waktu_kegiatan}}" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tempatKegiatan">Tempat Kegiatan</label>
                                    <input name="tempat_kegiatan" type="text" class="form-control" id="tempatKegiatan" value="{{old('tempat_kegiatan')}}">
                                </div> 
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
