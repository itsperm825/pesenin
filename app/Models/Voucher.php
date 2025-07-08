<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Voucher extends Model
{
    protected $fillable = ['code', 'type', 'value', 'expires_at'];
    /**
         * Mendapatkan nilai diskon yang sudah diformat.
         *
         * @return string
         */
        public function getFormattedValueAttribute()
        {
            return $this->type === 'percent' ? "{$this->value}%" : "Rp {$this->value}";
        }

        /**
         * Cek apakah voucher masih berlaku.
         *
         * @return bool
         */
        public function isValid()
        {
            return is_null($this->expires_at) || $this->expires_at->isFuture();
        }

}

   
