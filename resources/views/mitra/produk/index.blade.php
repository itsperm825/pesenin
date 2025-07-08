@extends('layouts.mitra')

@section('title', 'Daftar Produk Saya')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            {{-- di dalam file mitra/produk/index.blade.php --}}
            <div class="card-header">
                <h3 class="card-title">Tabel Produk</h3>
                <div class="card-tools">
                    {{-- TOMBOL LAMA --}}
                    <a href="{{ route('mitra.produk.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus"></i> Tambah Produk Baru
                    </a>
                    <a href="{{ route('mitra.produk.cetak') }}" class="btn btn-success btn-sm" target="_blank">
                        <i class="fas fa-print"></i> Cetak Daftar Produk
                    </a>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered table-hover">
                    <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th style="width: 100px;">Gambar</th>
                            <th>Produk</th>
                            <th>Harga</th>
                            <th style="width: 100px">Stok</th>
                            <th style="width: 150px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($produks as $produk)
                            <tr>
                                <td>{{ $loop->iteration + $produks->firstItem() - 1 }}</td>
                                <td>
                                    @if ($produk->gambar)
                                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama_produk }}" class="img-thumbnail" width="80">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>{{ $produk->nama_produk }}</td>
                                <td>Rp {{ number_format($produk->harga, 0, ',', '.') }}</td>
                                <td><span class="badge bg-success">{{ $produk->stok }}</span></td>
                                <td>
                                    <a href="{{ route('mitra.produk.edit', $produk->id) }}" class="btn btn-sm btn-warning">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    {{-- Form untuk tombol Hapus dengan class baru untuk JavaScript --}}
                                    <form action="{{ route('mitra.produk.destroy', $produk->id) }}" method="POST" class="d-inline form-hapus">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center">Anda belum memiliki produk.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
            <div class="card-footer clearfix">
                {{ $produks->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Menambahkan JavaScript di sini menggunakan @push --}}
@push('scripts')
{{-- Pastikan SweetAlert2 sudah di-load di layout utama Anda --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> --}}

<script>
    // 1. Script untuk Alert Sukses (Tambah/Update Produk)
    @if (session('success'))
        Swal.fire({
            title: "Berhasil!",
            text: "{{ session('success') }}", // Mengambil pesan dari session
            icon: "success",
            draggable: true
        });
    @endif

    // 2. Script untuk Konfirmasi Hapus (Destroy)
    document.addEventListener('DOMContentLoaded', function () {
        // Cari semua form dengan class 'form-hapus'
        const deleteForms = document.querySelectorAll('.form-hapus');
        
        deleteForms.forEach(form => {
            form.addEventListener('submit', function (event) {
                // Hentikan proses submit form standar
                event.preventDefault();

                // Tampilkan dialog konfirmasi SweetAlert2
                Swal.fire({
                    title: "Apakah Anda Yakin?",
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Ya, hapus!",
                    cancelButtonText: "Batal"
                }).then((result) => {
                    // Jika pengguna menekan tombol "Ya, hapus!"
                    if (result.isConfirmed) {
                        // Lanjutkan proses submit form
                        form.submit();
                    }
                });
            });
        });
    });
</script>
@endpush