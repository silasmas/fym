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
       Schema::create('events', function (Blueprint $table) {
    $table->id();
    $table->string('title');
    $table->string('slug')->unique();
    $table->string('location')->nullable();
    $table->dateTime('start_at');
    $table->dateTime('end_at')->nullable();
    $table->string('cover_image')->nullable();
    $table->longText('description')->nullable();
    $table->enum('status', ['draft','published'])->default('draft');
    $table->timestamps();
});

Schema::create('event_registrations', function (Blueprint $table) {
    $table->id();
    $table->foreignId('event_id')->constrained()->cascadeOnDelete();
    $table->string('name');
    $table->string('email')->nullable();
    $table->string('phone')->nullable();
    $table->text('message')->nullable();
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
