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
        Schema::create('consulteur_projet', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('consulteur_id');
            $table->unsignedBigInteger('projet_id');
            $table->timestamps();
        
            $table->foreign('consulteur_id')->references('id')->on('consulteurs')->onDelete('cascade');
            $table->foreign('projet_id')->references('id')->on('projets')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('consulteur_projet');
    }
};
