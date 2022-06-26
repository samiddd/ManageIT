<div class="md-form mb-5">
    <div class="form-group">
        <label>Nama Kegiatan</label>
        <input class="form-control"  name="nama_kegiatan" placeholder="Masukkan nama kegiatan" value="{{$data->nama_kegiatan}}">
        <div class="text-danger">
          @error ('nama_kegiatan')
              {{ $message }}
          @enderror
        </div>
    </div>
  </div>

  <div class="md-form mb-5">

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggalWaktuKegiatan">Tanggal dan Waktu Kegiatan</label>
                <input type="date" class="form-control" name="tanggal_kegiatan" value="{{ $data->tanggal_kegiatan}}">
                <div class="text-danger">
                  @error ('tanggal_kegiatan')
                      {{ $message }}
                  @enderror
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label for="tanggalWaktuKegiatan">.</label>
                <input type="time" class="form-control" name="waktu_kegiatan" value="{{ $data->waktu_kegiatan}}">
                <div class="text-danger">
                  @error ('waktu_kegiatan')
                      {{ $message }}
                  @enderror
                </div>
            </div>
        </div>
