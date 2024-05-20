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
        Schema::disableForeignKeyConstraints();
        Schema::create('mission', function (Blueprint $table) {
            $table->id('Id_Mission');
            $table->string('Nom_Mission', 250);
            $table->dateTime('Date_Debut', $precision = 0);
            $table->dateTime('Date_Fin', $precision = 0);
            $table->foreignId('Id_Utilisateur')->foreign()->references('Id_Utilisateur')->on('users');
            $table->foreignId('Id_Ville')->foreign()->references('Id_Ville')->on('ville');
            $table->foreignId('Id_Comptable')->nullable()->foreign()->references('Id_Utilisateur')->on('users');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mission');
    }
};
