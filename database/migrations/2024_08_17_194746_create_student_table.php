<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('student', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('name');
            $table->string('email')->unique();
            $table->unsignedInteger('track_id');
            $table->foreign('track_id')->references('id')->on('tracks')->onDelete('cascade');
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('student');
    }
};
