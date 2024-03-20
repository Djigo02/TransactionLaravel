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
        Schema::create('cartes', function (Blueprint $table) {
            $table->id();
            $table->string('numero');
            $table->string('username');
            $table->string('dateexp');
            $table->string('cvv');
            $table->integer('solde');
            $table->unsignedBigInteger('idU');
            $table->unsignedBigInteger('idC');
            $table->foreign('idC')->references('id')->on('comptes');
            $table->foreign('idU')->references('id')->on('utilisateurs');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cartes');
    }
};
