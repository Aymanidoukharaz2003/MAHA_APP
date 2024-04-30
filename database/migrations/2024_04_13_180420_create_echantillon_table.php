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
        Schema::create('echantillons', function (Blueprint $table) {
            $table->id();
            $table->string('nserie');
            $table->string('user_name');
            $table->string('consulteur');
            $table->string('description')->nullable();
            $table->enum('terminer', ['oui', 'non']);
            $table->unsignedBigInteger('produit_id');
            $table->foreign('produit_id')->references('id')->on('produits')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('echantillon');
    }
};
