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

            // DATA TOKO
            $table->string('store_name');
            $table->text('store_description')->nullable();

            // DATA PIC
            $table->string('pic_name');
            $table->string('pic_phone')->nullable();
            $table->string('pic_email')->nullable();

            // ALAMAT PIC
            $table->string('pic_street')->nullable();
            $table->string('pic_rt')->nullable();
            $table->string('pic_rw')->nullable();
            $table->string('pic_village')->nullable();
            $table->string('pic_city')->nullable();
            $table->string('pic_province')->nullable();

            // IDENTITAS PIC
            $table->string('pic_ktp_number')->nullable();
            $table->string('pic_photo_path')->nullable();
            $table->string('pic_ktp_file_path')->nullable();

            // STATUS
            $table->string('status')->default('PENDING');

            $table->timestamps();
        });
    }
};
