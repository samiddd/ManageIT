<div class="md-form mb-5">
    <div class="form-group">
        <label>Nama Tugas</label>
        <input class="form-control" name="nama_tugas" placeholder="Masukkan nama tugas"
            value="{{ old('nama_tugas') }}">
        <div class="text-danger">
            @error('nama_tugas')
                {{ $message }}
            @enderror
        </div>
    </div>

    <div class="form-group">
        <label>Prioritas</label>
        <select name="id_prioritas" class="form-control" id="">
            <option value="" selected disabled>Pilih Prioritas</option>
            <option value="1">Penting dan Mendesak</option>
            <option value="2">Penting dan Tidak Mendesak</option>
            <option value="3">Tidak Penting dan Mendesak</option>
            <option value="4">Tidak Penting dan Tidak Mendesak</option>
        </select>
    </div>

    <div class="md-form mb-5">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggalWaktuTugas">Tanggal dan Waktu Kegiatan</label>
                    <input type="date" class="form-control" name="tanggal_tugas" value="{{ old('tanggal_tugas') }}">
                    <div class="text-danger">
                        @error('tanggal_tugas')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="tanggalWaktuTugas">.</label>
                    <input type="time" class="form-control" name="waktu_tugas" value="{{ old('waktu_tugas') }}">
                    <div class="text-danger">
                        @error('waktu_kegiatan')
                            {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
        </div>
