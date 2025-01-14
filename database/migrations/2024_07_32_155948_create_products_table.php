<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('quantity');
            $table->text('description')->nullable();
            $table->text('imagpath')->nullable();
            $table->text('price');
            $table->unsignedBigInteger('category_id');
            $table->foreign('category_id')->references('id')->on('varieties')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
