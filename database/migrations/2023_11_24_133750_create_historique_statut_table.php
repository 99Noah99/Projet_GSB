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
        Schema::create('historique_statut', function (Blueprint $table) {
            $table->id('Id_Historique');
            $table->foreignId('Id_Mission')->foreign()->references('Id_Mission')->on('mission');
            $table->foreignId('Id_Statut')->foreign()->references('Id_Statut')->on('statut');
            $table->dateTime('Date_Changement', $precision = 0);
            $table->timestamps();
        });       
         Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('historique_statut');
    }
};
