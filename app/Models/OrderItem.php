<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $fillable = ['order_id', 'product_id', 'jumlah', 'harga'];

    // Relasi: Satu OrderItem dimiliki oleh satu Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relasi: Satu OrderItem merujuk pada satu Product
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}