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
        Schema::create('haders', function (Blueprint $table) {
            $table->id();
            $table->text('subtitle');
            $table->text('titel');
            $table->text('imagpath');
            $table->text('bottun_rad');
            $table->text('bottun_with');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haders');
    }
};
