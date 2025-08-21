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
       Schema::create('services', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('icon')->nullable(); // ex: heroicon-o-leaf
    $table->text('summary')->nullable();
    $table->longText('content')->nullable();
    $table->unsignedInteger('position')->default(0);
    $table->enum('status', ['hidden','visible'])->default('visible');
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
