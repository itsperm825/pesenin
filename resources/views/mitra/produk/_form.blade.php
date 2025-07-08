@csrf
<div class="card-body">
    <div class="form-group">
        <label for="nama_produk">Nama Produk</label>
        {{-- Gunakan @isset untuk memeriksa apakah ini form edit atau create --}}
        <input type="text" class="form-control @error('nama_produk') is-invalid @enderror" id="nama_produk" name="nama_produk" placeholder="Masukkan Nama Produk" value="{{ old('nama_produk', isset($produk) ? $produk->nama_produk : '') }}">
        @error('nama_produk') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="form-group">
        <label for="deskripsi">Deskripsi</label>
        <textarea class="form-control @error('deskripsi') is-invalid @enderror" rows="4" id="deskripsi" name="deskripsi" placeholder="Jelaskan tentang produk Anda">{{ old('deskripsi', isset($produk) ? $produk->deskripsi : '') }}</textarea>
        @error('deskripsi') <span class="text-danger">{{ $message }}</span> @enderror
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="harga">Harga (Rp)</label>
                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" placeholder="Contoh: 15000" value="{{ old('harga', isset($produk) ? $produk->harga : '') }}">
                @error('harga') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="stok">Stok</label>
                <input type="number" class="form-control @error('stok') is-invalid @enderror" id="stok" name="stok" placeholder="Jumlah stok tersedia" value="{{ old('stok', isset($produk) ? $produk->stok : '') }}">
                @error('stok') <span class="text-danger">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="gambar">Gambar Produk</label>
        @if(isset($produk) && $produk->gambar)
            <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-thumbnail d-block mb-2" width="200" alt="Current Image">
        @endif
        <div class="input-group">
            <div class="custom-file">
                <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" id="gambar" name="gambar">
                <label class="custom-file-label" for="gambar">Pilih file (Kosongkan jika tidak ganti)</label>
            </div>
        </div>
        @error('gambar') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
</div>
<div class="card-footer">
    <button type="submit" class="btn btn-primary">{{ $tombol }}</button>
    {{-- Perbaiki nama rute ini jika Anda masih menggunakan prefix 'mitra.' --}}
    <a href="{{ route('produk.index') }}" class="btn btn-secondary">Batal</a>
</div>