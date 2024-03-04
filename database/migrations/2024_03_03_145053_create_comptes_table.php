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
        Schema::create('comptes', function (Blueprint $table) {
            $table->id();
            $table->integer('RIB')->unique();
            $table->integer('solde');
            $table->integer('status');
            $table->unsignedBigInteger('typecompte');
            $table->unsignedBigInteger('typepack');
            $table->unsignedBigInteger('idutilisateur');
            $table->foreign('typecompte')->references('id')->on('tcomptes');
            $table->foreign('typepack')->references('id')->on('packs');
            $table->foreign('idutilisateur')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comptes');
    }
};
