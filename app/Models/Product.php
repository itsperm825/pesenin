<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'nama_produk',
        'deskripsi',
        'harga',
        'stok',
        'gambar',
        // 'category_id', // Aktifkan jika Anda sudah punya tabel kategori
    ];

    /**
     * Mendefinisikan relasi "belongsTo" ke model User.
     * Artinya, satu produk dimiliki oleh satu user (mitra).
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}