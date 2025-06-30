{{-- @extends('layouts.app') --}}
{{-- @section('content') --}}

<div style="padding: 20px;">
    <h1>Edit Produk: {{ $produk->nama_produk }}</h1>

    {{-- Form ini akan mengirim data ke method 'update' di ProdukController --}}
    <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT') {{-- Method PUT untuk proses update --}}

        <div style="margin-bottom: 15px;">
            <label for="nama_produk">Nama Produk</label><br>
            <input type="text" id="nama_produk" name="nama_produk" value="{{ old('nama_produk', $produk->nama_produk) }}" style="width: 50%;">
            @error('nama_produk') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="deskripsi">Deskripsi</label><br>
            <textarea id="deskripsi" name="deskripsi" rows="4" style="width: 50%;">{{ old('deskripsi', $produk->deskripsi) }}</textarea>
            @error('deskripsi') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="harga">Harga (Rp)</label><br>
            <input type="number" id="harga" name="harga" value="{{ old('harga', $produk->harga) }}" style="width: 50%;">
            @error('harga') <div style="color: red;">{{ $message }}</div> @enderror
        </div>

        <div style="margin-bottom: 15px;">
            <label for="stok">Stok</label><br>
            <input type="number" id="stok" name="stok" value="{{ old('stok', $produk->stok) }}" style="width: 50%;">
            @error('stok') <div style="color: red;">{{ $message }}</div> @enderror
        </div>
        
        <div style="margin-bottom: 15px;">
            <label for="gambar">Gambar Produk (Kosongkan jika tidak ingin ganti)</label><br>
            @if($produk->gambar)
                <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Gambar saat ini" width="150" style="margin-bottom:10px;">
            @endif
            <input type="file" id="gambar" name="gambar">
            @error('gambar') <div style="color: red;">{{ $message }}</div> @enderror
        </div>
        
        <button type="submit" style="background-color: blue; color: white; padding: 10px 15px; border: none; border-radius: 5px; cursor: pointer;">Update Produk</button>
        <a href="{{ route('produk.index') }}">Batal</a>
    </form>
</div>
{{-- @endsection --}}