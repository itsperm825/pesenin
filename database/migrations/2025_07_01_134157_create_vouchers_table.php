<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('vouchers', function (Blueprint $table) {
        $table->id();
        $table->string('code')->unique(); // Kode voucher harus unik
        $table->enum('type', ['fixed', 'percent'])->comment('Tipe diskon: nominal tetap atau persentase');
        $table->decimal('value', 15, 2); // Nilai diskonnya
        $table->timestamp('expires_at')->nullable(); // Tanggal kedaluwarsa (opsional)
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vouchers');
    }
};
