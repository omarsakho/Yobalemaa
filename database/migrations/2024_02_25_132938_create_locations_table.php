<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('locations', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->integer('age');
            $table->string('cni')->unique();
            $table->string('adresse');
            $table->string('lieu_depart');
            $table->string('lieu_arrivee');
            $table->dateTime('heure_debut');
            $table->dateTime('heure_fin');
            $table->foreignId('vehicule_id')->constrained('vehicules');
            $table->foreignId('client_id')->constrained('clients')->onDelete('cascade');
            $table->decimal('prix_total', 10, 2)->default(0.00);
            $table->boolean('validated')->default(false);

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
        Schema::dropIfExists('locations');
    }
}
