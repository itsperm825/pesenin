@extends('layouts.mitra') {{-- Memberitahu Blade untuk menggunakan layout mitra --}}

@section('content') {{-- Memulai bagian konten yang akan dimasukkan ke @yield('content') --}}
<div class="container-fluid py-4">
    <div class="row">
        <div class="col-12">
            <div class="card my-4">
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3 d-flex justify-content-between align-items-center">
                        <h6 class="text-white text-capitalize ps-3">Tabel Produk Saya</h6>
                        <a href="{{ route('produk.create') }}" class="btn bg-gradient-dark me-3">+ Tambah Produk</a>
                    </div>
                </div>
                <div class="card-body px-0 pb-2">
                    @if (session('success'))
                        <div class="alert alert-success text-white mx-4" role="alert">
                            {{ session('success') }}
                        </div>
                    @endif
                    <div class="table-responsive p-0">
                        <table class="table align-items-center mb-0">
                            <thead>
                                <tr>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Produk</th>
                                    <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ps-2">Harga</th>
                                    <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Stok</th>
                                    <th class="text-secondary opacity-7"></th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($produks as $produk)
                                    <tr>
                                        <td>
                                            <div class="d-flex px-2 py-1">
                                                <div>
                                                    @if ($produk->gambar)
                                                        <img src="{{ asset('storage/' . $produk->gambar) }}" class="avatar avatar-sm me-3 border-radius-lg" alt="{{ $produk->nama_produk }}">
                                                    @else
                                                        <img src="https://via.placeholder.com/150" class="avatar avatar-sm me-3 border-radius-lg" alt="No Image">
                                                    @endif
                                                </div>
                                                <div class="d-flex flex-column justify-content-center">
                                                    <h6 class="mb-0 text-sm">{{ $produk->nama_produk }}</h6>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <p class="text-xs font-weight-bold mb-0">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                                        </td>
                                        <td class="align-middle text-center text-sm">
                                            <span class="badge badge-sm bg-gradient-success">{{ $produk->stok }}</span>
                                        </td>
                                        <td class="align-middle">
                                            <a href="{{ route('produk.edit', $produk->id) }}" class="text-secondary font-weight-bold text-xs" data-toggle="tooltip" data-original-title="Edit user">
                                                Edit
                                            </a>
                                            <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-link text-danger text-gradient px-3 mb-0" onclick="return confirm('Yakin ingin menghapus produk ini?')">Hapus</button>
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center py-4">Anda belum memiliki produk.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="px-4 pt-2">
                        {{ $produks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection {{-- Mengakhiri bagian konten --}}