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
        Schema::create('paies', function (Blueprint $table) {
            $table->id();
            $table->string('retard_just');
            $table->string('retard_non_just');
            $table->string('absence_just');
            $table->string('absence_non_just');
            $table->double('salaire_net');
            $table->double('salaire_brut');
            $table->double('tva');
            $table->foreignId('employe_id')->constrained()->onDelete('cascade');
            $table->foreignId('contrat_id')->constrained()->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paies');
    }
};
