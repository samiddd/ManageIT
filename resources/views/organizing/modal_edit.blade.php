<div class="md-form mb-5">
    <div class="form-group">
        <label>Nama Divisi</label>
        <input class="form-control" name="nama_divisi" placeholder="Masukkan nama divisi"
            value="{{ $divisi->nama_divisi }}">
        <div class="text-danger">
            @error('nama_divisi')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="form-group">
        <select class="form-control" name="id_user" id="">
            <option value="" selected disabled>Pilih Koordinator Divisi</option>
            @foreach ($user as $user)
                <option value="{{ $user->id }}">{{ $user->nama_user }}</option>
            @endforeach
        </select>
    </div>
</div>
