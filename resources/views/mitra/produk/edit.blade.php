@extends('layouts.mitra')

@section('title', 'Edit Produk')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card card-primary">
            <div class="card-header">
                <h3 class="card-title">Edit Produk: {{ $produk->nama_produk }}</h3>
            </div>
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('mitra.produk._form', ['produk' => $produk, 'tombol' => 'Update Produk'])
            </form>
        </div>
    </div>
</div>
@endsection