@csrf 
<div class="row">
    <div class="col-md-8">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Nama Produk</label>
            <input type="text" name="nama_produk" class="form-control" value="{{ old('nama_produk', $produk->nama_produk ?? '') }}">
        </div>
        @error('nama_produk') <div class="text-danger ps-1">{{ $message }}</div> @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5">{{ old('deskripsi', $produk->deskripsi ?? '') }}</textarea>
        </div>
        @error('deskripsi') <div class="text-danger ps-1">{{ $message }}</div> @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Harga (Rp)</label>
            <input type="number" name="harga" class="form-control" value="{{ old('harga', $produk->harga ?? '') }}">
        </div>
        @error('harga') <div class="text-danger ps-1">{{ $message }}</div> @enderror
    </div>
    <div class="col-md-4">
        <div class="input-group input-group-outline my-3">
            <label class="form-label">Stok</label>
            <input type="number" name="stok" class="form-control" value="{{ old('stok', $produk->stok ?? '') }}">
        </div>
        @error('stok') <div class="text-danger ps-1">{{ $message }}</div> @enderror
    </div>
</div>
<div class="row">
    <div class="col-md-8">
        <label>Gambar Produk</label>
        @if(isset($produk) && $produk->gambar)
            <img src="{{ asset('storage/' . $produk->gambar) }}" class="img-fluid border-radius-lg d-block my-2" width="200" alt="Current Image">
        @endif
        <div class="input-group input-group-outline my-3">
            <input type="file" name="gambar" class="form-control">
        </div>
        @error('gambar') <div class="text-danger ps-1">{{ $message }}</div> @enderror
    </div>
</div>
<div class="row">
    <div class="col-12">
        <button type="submit" class="btn bg-gradient-primary mt-3 mb-0">{{ $tombol }}</button>
        <a href="{{ route('produk.index') }}" class="btn btn-outline-secondary mt-3 mb-0">Batal</a>
    </div>
</div>