<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('warranties', function (Blueprint $table) {
            $table->id();

            $table->foreignId('product_id')
                  ->constrained('products')
                  ->onDelete('cascade');

            $table->string('warranty_provider')->nullable();

            $table->string('warranty_type')->nullable();

            $table->date('start_date');

            $table->date('end_date');

            $table->text('terms')->nullable();

            $table->string('warranty_document')->nullable();

            $table->enum('status', [
                'active',
                'expired',
                'claimed'
            ])->default('active');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('warranties');
    }
};