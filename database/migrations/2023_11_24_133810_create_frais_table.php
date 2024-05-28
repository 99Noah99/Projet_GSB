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
        Schema::create('frais', function (Blueprint $table) {
            $table->id('Id_Frais');
            $table->string('Demandeur', 30);
            $table->string('Intitule', 200);
            $table->decimal('Prix_Total', $precision = 17, $scale = 2);
            $table->dateTime('Date_Depense', $precision = 0);
            $table->string('NomBase_Justificatif', 150);
            $table->string('NouveauNom_Justificatif', 150);
            $table->string('Extensions', 10);
            $table->string('Chemin', 300);
            $table->foreignId('Id_Mission')->foreign()->references('Id_Mission')->on('mission');
            $table->foreignId('Id_TypeDepense')->foreign()->references('Id_TypeDepense')->on('type_depense');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('frais');
    }
};
