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
        Schema::disableForeignKeyConstraints(); //permet de désactivé la vérification des dépendances et des clés pour créer la table
        Schema::create('users', function (Blueprint $table) {
            $table->id('Id_Utilisateur');
            $table->string('Nom', 30);
            $table->string('Prenom',30);
            $table->string('Email',100)->unique();
            $table->string('Identifiant',20);
            $table->string('Mdp');
            $table->foreignId('Id_Fonction')->foreign()->references('Id_Fonction')->on('fonction');
            $table->string('remember_token',255)->nullable();
            $table->timestamps();
        });    
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
