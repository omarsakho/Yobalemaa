<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehiculesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicules', function (Blueprint $table) {
            $table->id();
            $table->string('marque');
            $table->string('modele');
            $table->date('date');
            $table->integer('kilometrage');
            $table->string('statut');
            $table->integer('nbre_de_place');
            $table->string('image');
            $table->string('categorie');
            $table->unsignedBigInteger('chauffeur_id');
            $table->foreign('chauffeur_id')->references('id')->on('chauffeurs')->onDelete('cascade');
            $table->decimal('prix_par_heure', 8);
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
        Schema::dropIfExists('vehicules');
    }
}
