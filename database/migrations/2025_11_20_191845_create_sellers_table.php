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
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();

            // Relasi user (penjual)
            $table->foreignId('user_id')->constrained()->onDelete('cascade');

            // Data toko (SRS-MartPlace-01)
            $table->string('storeName');
            $table->text('storeDescription');

            // Data PIC
            $table->string('picName');
            $table->string('picPhone');
            $table->string('picEmail');

            // Alamat PIC (SRS mewajibkan)
            $table->string('picStreet');
            $table->string('picRT');
            $table->string('picRW');
            $table->string('picVillage');
            $table->string('picCity');
            $table->string('picProvince');

            // Identitas
            $table->string('picKtpNumber');
            $table->string('picPhoto');   // path foto PIC
            $table->string('picKtpFile'); // path foto/file KTP

            // Status verifikasi oleh admin
            $table->enum('status', ['pending', 'active', 'rejected'])->default('pending');

            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
