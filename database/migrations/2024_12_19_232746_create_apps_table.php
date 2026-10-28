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
        Schema::create('apps', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->string('allDeviceImg')->nullable();
            $table->string('icon')->nullable();
            $table->longText('description')->nullable();
            $table->longText('tagline')->nullable();
            $table->json('screenshot')->nullable();
            $table->json('module')->nullable();
            $table->json('procedure')->nullable();
            $table->json('benefit')->nullable();
            $table->json('step')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps');
    }
};
