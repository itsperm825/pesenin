@extends('layouts.mitra')

@section('title', 'Tambah Produk Baru')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Formulir Tambah Produk</h3>
            </div>
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @include('mitra.produk._form', ['tombol' => 'Simpan Produk'])
            </form>
        </div>
    </div>
</div>
@endsection