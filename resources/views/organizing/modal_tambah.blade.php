<div class="md-form mb-5">
    <div class="form-group">
        <label>Nama Divisi</label>
        <input class="form-control" name="nama_divisi" placeholder="Masukkan nama divisi"
            value="{{ old('nama_divisi') }}">
        <div class="text-danger">
            @error('nama_divisi')
                {{ $message }}
            @enderror
        </div>
    </div>
</div>
