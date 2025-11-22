<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id();  
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');

            $table->string('store_name');
            $table->string('pic_name');
            $table->string('email');
            $table->string('phone');

            $table->string('province');
            $table->string('city');
            $table->text('address');

            $table->string('pic_photo');    // WAJIB DARI SRS
            $table->string('ktp_photo');    // WAJIB DARI SRS

            $table->enum('status', ['pending', 'approved', 'rejected'])
                ->default('pending');

            $table->timestamps();
        });

    }

    public function down(): void
    {
        Schema::dropIfExists('sellers');
    }
};
