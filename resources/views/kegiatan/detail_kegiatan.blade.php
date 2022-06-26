@extends('layout.template')

@section('title')
    Detail Kegiatan 
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
        
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="namaKegiatan">Nama Kegiatan</label>
                                    <input type="text" class="form-control" id="namaKegiatan" value="{{$kegiatan->nama_kegiatan}}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="latarBelakangKegiatan">Latar Belakang Kegiatan</label>
                                    <textarea class="form-control" id="latarBelakangKegiatan" rows="3" readonly> {{$kegiatan->latar_belakang_kegiatan}} </textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsiKegiatan">Deskripsi Kegiatan</label>
                                    <textarea class="form-control" id="deskripsiKegiatan" rows="3" placeholder="Masukkan deskripsi kegiatan" readonly> {{$kegiatan->deskripsi_kegiatan}}</textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="tujuanKegiatan">Tujuan Kegiatan</label>
                                    <input type="text" class="form-control" id="tujuanKegiatan" value="{{$kegiatan->tujuan_kegiatan}}" readonly></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="sasaranKegiatan">Sasaran Kegiatan</label>
                                    <input type="text" class="form-control" id="sasaranKegiatan" rows="" value="{{$kegiatan->sasaran_kegiatan}}" readonly>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggalWaktuKegiatan">Tanggal dan Waktu Kegiatan</label>
                                            <input type="date" class="form-control" id="tanggalKegiatan" value="{{$kegiatan->tanggal_kegiatan}}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="tanggalWaktuKegiatan">.</label>
                                            <input type="time" class="form-control" id="waktuKegiatan" value="{{$kegiatan->waktu_kegiatan}}" readonly> 
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="tempatKegiatan">Tempat Kegiatan</label>
                                    <input type="text" class="form-control" id="tempatKegiatan" value="{{ $kegiatan->tempat_kegiatan }}" readonly>
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
