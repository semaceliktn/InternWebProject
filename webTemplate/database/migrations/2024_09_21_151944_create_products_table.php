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
            $table->integer('kategori_id');
            $table->integer('altkategori_id');
            $table->string('baslik')->nullable();
            $table->string('url')->nullable();
            $table->string('tag')->nullable();
            $table->string('anahtar')->nullable();
            $table->string('aciklama')->nullable();
            $table->string('metin')->nullable();
            $table->string('resim')->nullable();
            $table->boolean('durum')->default(0);
            $table->string('sirano')->default(1);
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
