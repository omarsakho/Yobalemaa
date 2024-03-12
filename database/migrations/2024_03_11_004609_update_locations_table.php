<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->dropColumn('cni'); 

            $table->string('tel')->unique()->after('age'); 
            $table->string('email')->unique()->after('adresse'); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('locations', function (Blueprint $table) {
            $table->string('cni')->unique()->after('age'); 

            $table->dropColumn('tel'); 
            $table->dropColumn('email');
        });
    }
}
