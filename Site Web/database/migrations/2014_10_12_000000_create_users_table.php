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
        Schema::create('users', function (Blueprint $table) {
            $table->id('Id_Utilisateur');
            $table->string('Nom', 30);
            $table->string('Prenom',30);
            $table->string('Email',100)->unique();
            $table->string('Identifiant',20);
            $table->string('Mdp');
            $table->foreignId('Id_Fonction');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
