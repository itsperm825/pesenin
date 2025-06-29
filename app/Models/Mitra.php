<?php

namespace App\Models;

use Backpack\CRUD\app\Models\Traits\CrudTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class Mitra extends Model
{
    use CrudTrait;
    use HasFactory;

    // Tentukan nama tabel jika tidak sesuai dengan nama model jamak
    protected $table = 'mitra';

    // Definisikan kolom yang boleh diisi secara massal (mass assignable)
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

    /**x
     * Mendefinisikan relasi "milik" ke model User.
     * Setiap profil mitra dimiliki oleh satu user.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // --- TAMBAHKAN FUNGSI BARU DI BAWAH INI ---
    public function getFotoMasakanHtmlAttribute()
    {
        $html = '';
        // Decode data JSON dari database
        $fotoPaths = json_decode($this->paths_foto_masakan);

        if (is_array($fotoPaths)) {
            foreach ($fotoPaths as $path) {
                // Buat tag <img> untuk setiap foto
                $url = Storage::url($path);
                $html .= '<a href="'.$url.'" data-lightbox="gallery-'.$this->id.'"><img src="'.$url.'" width="40" height="40" style="object-fit: cover; border-radius: 5px; margin-right: 5px;"></a>';
            }
        }
        return $html;
    }
}