@extends('layouts.mitra')

@section('content')
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0">
            <h6>Edit Produk</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @method('PUT')
                @include('mitra.produk._form', ['tombol' => 'Update Produk'])
            </form>
        </div>
    </div>
</div>
@endsection