<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mitra extends Model
{
    use CrudTrait;
    use HasFactory;

    // Mendefinisikan nama tabel secara eksplisit agar sesuai dengan migrasi Anda
    protected $table = 'mitra';

    // Kolom-kolom yang boleh diisi secara massal
    protected $fillable = [
        'user_id',
        'telepon',
        'nama_usaha',
        'jenis_kuliner',
        'deskripsi',
        'alamat_usaha',
        'paths_foto_masakan',
        'status_verifikasi',
    ];

    /**
     * The attributes that should be cast.
     * PENTING: Ini memberitahu Laravel untuk otomatis mengubah
     * kolom 'paths_foto_masakan' dari JSON (di database) menjadi array (di PHP)
     * dan sebaliknya.
     *
     * @var array
     */
    protected $casts = [
        'paths_foto_masakan' => 'array',
    ];

    /**
     * Mendefinisikan relasi bahwa satu data Mitra ini dimiliki oleh satu User.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}