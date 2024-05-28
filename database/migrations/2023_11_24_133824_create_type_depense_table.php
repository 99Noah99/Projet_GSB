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
        Schema::create('type_depense', function (Blueprint $table) {
            $table->id('Id_TypeDepense');
            $table->string('Nom_TypeDepense', 50);
            $table->decimal('Prix_unite', $precision = 6, $scale = 2);
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('type_depense');
    }
};
