<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'total_harga', 'status', 'alamat_pengiriman', 'telepon_penerima'
    ];

    // Relasi: Satu Order dimiliki oleh satu User (pemesan)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi: Satu Order memiliki banyak OrderItem
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}