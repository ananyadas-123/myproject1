<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('product_passports', function (Blueprint $table) {
            $table->id();

            // Product linked with this passport
            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');

            // Passport information
            $table->string('passport_number')->unique();
            $table->text('description')->nullable();

            // QR code data
            $table->string('qr_code')->nullable();

            // Passport status
            $table->enum('status', [
                'active',
                'archived'
            ])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('product_passports');
    }
};