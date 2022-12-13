<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEcEnsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ec_ens', function (Blueprint $table) {
            $table->id();
            $table->integer("vh")->nullable();
            $table->decimal('credit', $precision = 8, $scale = 1);
            $table->foreignId("p_id")->constrained("parcours");
            $table->foreignId("sem_id")->constrained("semestres");
            $table->foreignId("niv_id")->constrained("niveaux");
            $table->foreignId("elc_id")->constrained("el_cs");
            $table->foreignId("ens_id")->constrained("enseignants");
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
        Schema::table("ec_ens" , function (Blueprint $table) {
            $table->dropConstrainedForeignId("p_id");
            $table->dropConstrainedForeignId("sem_id");
            $table->dropConstrainedForeignId("niv_id");
            $table->dropConstrainedForeignId("elc_id");
            $table->dropConstrainedForeignId("ens_id");
        });
        Schema::dropIfExists('ec_ens');
    }
}
