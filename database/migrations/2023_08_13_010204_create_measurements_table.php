<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('measurements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('client_id')->constrained()->onDelete('cascade');
            $table->string('epaule');
            $table->string('taille_t');
            $table->string('taille_b');
            $table->string('dos');
            $table->string('bassin_t');
            $table->string('bassin_b');
            $table->string('poitrine');
            $table->string('fesse');
            $table->string('cuisses');
            $table->string('l_taille');
            $table->string('longueur');
            $table->string('l_total');
            $table->string('fond');
            $table->string('braquette');
            $table->string('l_manche');
            $table->string('pied');
            $table->string('t_manche');
            $table->string('col');
            $table->string('nb_poches_t');
            $table->string('nb_poches_b');
            $table->string('cv');
            $table->string('cd');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('measurements');
    }
};
