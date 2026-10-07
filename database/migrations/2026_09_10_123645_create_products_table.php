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

            // Product owner
            $table->foreignId('user_id')
                  ->constrained('users')
                  ->onDelete('cascade');

            // Product information
            $table->string('category');
            $table->string('brand');
            $table->string('model');
            $table->string('serial_number')->unique();

            // Purchase information
            $table->date('purchase_date');
            $table->decimal('purchase_price', 10, 2)->nullable();

            // Product condition
            $table->enum('condition', [
                'new',
                'good',
                'fair',
                'poor'
            ])->default('new');

            // Files
            $table->string('image')->nullable();
            $table->string('invoice')->nullable();

            // Product lifecycle status
            $table->enum('status', [
                'active',
                'sold',
                'donated',
                'recycled'
            ])->default('active');

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