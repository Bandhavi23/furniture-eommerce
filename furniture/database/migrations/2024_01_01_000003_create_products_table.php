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
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description');
            $table->decimal('price', 10, 2);
            $table->decimal('sale_price', 10, 2)->nullable();
            $table->integer('stock')->default(0);
            $table->string('sku')->unique();
            $table->string('image');
            $table->json('images')->nullable();
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->json('specifications')->nullable();
            $table->string('brand')->nullable();
            $table->string('material')->nullable();
            $table->string('color')->nullable();
            $table->string('dimensions')->nullable();
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