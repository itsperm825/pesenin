<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    // dalam file ..._create_products_table.php

        public function up()
        {
            Schema::create('products', function (Blueprint $table) {
                $table->id(); // Kolom ID utama untuk produk

                // Kolom untuk menghubungkan produk ini dengan pemiliknya (mitra)
                // Ini adalah foreign key ke tabel 'users'
                $table->foreignId('user_id')->constrained()->onDelete('cascade');

                // Kolom-kolom untuk detail produk
                $table->string('nama_produk');
                $table->text('deskripsi'); // 'text' untuk deskripsi yang bisa panjang
                $table->decimal('harga', 10, 2); // 'decimal' adalah tipe terbaik untuk uang
                $table->integer('stok');
                $table->string('gambar')->nullable(); // 'nullable' berarti gambar boleh kosong

                $table->timestamps(); // Kolom created_at dan updated_at
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
