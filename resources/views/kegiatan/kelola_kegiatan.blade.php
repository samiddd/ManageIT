@extends('layout.template')

@section('title')
    Kelola Kegiatan
@endsection

@section('page-info')
    <div class="page-info">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Apps</a></li>
                <li class="breadcrumb-item"><a href="#">Kegiatan Saya</a></li>
                <li class="breadcrumb-item active" aria-current="page">Kelola Kegiatan</li>
            </ol>
        </nav>
    </div>
    </div>
@endsection



@section('content')
    <div class="main-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <div class="card card-transparent file-list recent-files">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-lg-6 col-xl-3">
                                <div class="card file photo">
                                    <a href="/kegiatan/kelola/{{ $id }}/planning">
                                        <div class="card-header file-icon">
                                            <i><img class="card-img-top" src="../../assets/images/POAC/Planning.jpg "
                                                    alt="Card image cap" height="225px"></i>
                                        </div>
                                        <div class="card-body file-info">
                                            <p>Planning</p>
                                            <span class="file-size">Perencanaan</span><br>
                                            <span class="file-date">Planning atau Perencanaan adalah proses penentuan
                                                tujuan atau sasaran
                                                yang hendak dicapai dan menetapkan jalan dan sumber yang diperlukan
                                                untuk mencapai tujuan seefektif dan seefisien mungkin. </span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-3">
                                <div class="card file pdf">
                                    <a href="/kegiatan/kelola/{{ $id }}/organizing">
                                        <div class="card-header file-icon">
                                            <i><img class="card-img-top" src="../../assets/images/POAC/Organizing.jpg "
                                                    alt="Card image cap" height="225px"></i>
                                        </div>
                                        <div class="card-body file-info">
                                            <p>Organizing</p>
                                            <span class="file-size">Pengorganisasian</span><br>
                                            <span class="file-date"> Pengorganisasian pada dasarnya
                                                merupakan upaya untuk melengkapi rencana-rencana yang telah dibuat
                                                dengan susunan organisasi pelaksananya. </span>
                                        </div>
                                    </a>

                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-3">
                                <div class="card file code">
                                    <!-- // ui-tooltips -->
                                    <a href="/kegiatan/kelola/{{ $id }}/actuating">
                                        <div class="card-header file-icon">
                                            <i><img class="card-img-top" src="../../assets/images/POAC/Actuating.jpg "
                                                    alt="Card image cap" height="225px"></i>
                                        </div>
                                        <div class="card-body file-info">
                                            <p>Actuating</p>
                                            <span class="file-size">Menggerakkan</span><br>
                                            <span class="file-date">Upaya untuk menjadikan perencanaan
                                                menjadi kenyataan melalui berbagai pengarahan dan pemotivasian
                                                agar anggota dapat melaksanakan kegiatan secara optimal sesuai
                                                dengan peran, tugas dan tanggung jawabnya</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                            <div class="col-lg-6 col-xl-3">
                                <div class="card file audio">
                                    <!-- // ui-tooltips -->
                                    <a href="/kegiatan/kelola/{{ $id }}/controlling">
                                        <div class="card-header file-icon">
                                            <i><img class="card-img-top" src="../../assets/images/POAC/Controlling.jpg "
                                                    alt="Card image cap" height="225px"></i>
                                        </div>
                                        <div class="card-body file-info">
                                            <p>Controlling</p>
                                            <span class="file-size">Pengawasan</span><br>
                                            <span class="file-date">Pengawasan merupakan penerapan suatu cara
                                                atau tools yang mampu menjamin bahwa rencana yang telah dilaksanakan
                                                telah sesuai dengan yang ditetapkan</span>
                                        </div>
                                    </a>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            @endsection
