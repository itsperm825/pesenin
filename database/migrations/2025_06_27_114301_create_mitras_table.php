<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // database/migrations/xxxx_xx_xx_xxxxxx_create_mitra_table.php

public function up(): void
{
    Schema::create('mitra', function (Blueprint $table) {
        $table->id();

        // Kunci asing untuk menghubungkan ke tabel 'users'
        $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

        // Kolom-kolom dari formulir pendaftaran
        $table->string('telepon', 20);
        $table->string('nama_usaha');
        $table->string('jenis_kuliner');
        $table->text('deskripsi');
        $table->text('alamat_usaha');
        $table->json('paths_foto_masakan')->nullable(); // Menyimpan path banyak foto dalam format JSON
        
        // Anda bisa menambahkan kolom status untuk verifikasi
        $table->enum('status_verifikasi', ['pending', 'disetujui', 'ditolak'])->default('pending');

        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mitras');
    }
};
