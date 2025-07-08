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
            Schema::create('products', function (Blueprint $table) {
                $table->id();

                // PASTIKAN BARIS INI ADA DI DALAMNYA
                // Ini akan membuat kolom user_id sekaligus menghubungkannya ke tabel users
                $table->foreignId('user_id')->constrained()->onDelete('cascade');

                // Kolom-kolom lainnya
                $table->string('nama_produk');
                $table->text('deskripsi');
                $table->decimal('harga', 10, 2);
                $table->integer('stok');
                $table->string('gambar')->nullable();
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         *
         * @return void
         */
        public function down()
        {
            Schema::dropIfExists('products');
        }

};
