<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->foreignId('seller_id')->constrained('sellers')->onDelete('cascade');

            $table->string('name');            // Nama produk
            $table->string('category');        // Kategori
            $table->string('condition');       // Baru / Preloved
            $table->decimal('price', 12, 2);   // Harga
            $table->integer('stock');          // Stok
            $table->text('description');       // Deskripsi

            $table->string('thumbnail');       // Foto produk utama
            $table->json('images')->nullable(); // Foto tambahan (optional)

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
