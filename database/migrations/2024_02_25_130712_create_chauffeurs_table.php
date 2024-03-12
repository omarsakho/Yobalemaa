<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChauffeursTable extends Migration
{
    public function up()
    {
        Schema::create('chauffeurs', function (Blueprint $table) {
            $table->id();
            $table->string('prenom');
            $table->string('nom');
            $table->integer('experience');
            $table->unsignedBigInteger('permis_id')->unique();
            // Ajoutez d'autres colonnes au besoin
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chauffeurs');
    }
}
