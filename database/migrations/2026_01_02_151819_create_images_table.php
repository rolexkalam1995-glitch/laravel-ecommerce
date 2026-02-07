<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('images', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->constrained('products')->onDelete('cascade');
            $table->string('file_name');
            $table->string('public_path');  // storage/products/product1.jpg
            $table->string('file_hash', 64)->unique(); //duplicate detection 
            $table->string('video_url')->nullable(); // optional video link
            $table->string('alt_text')->nullable();  // for SEO/accessibility
            $table->unique(['product_id', 'file_hash']);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('images');
    }
};
