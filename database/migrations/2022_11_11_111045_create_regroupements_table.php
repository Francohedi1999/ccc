<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegroupementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('regroupements', function (Blueprint $table) {
            $table->id();
            $table->date("date")->nullable();
            $table->time("h_reg_1", $precision = 0 )->nullable();
            $table->time("h_reg_2", $precision = 0 )->nullable();
            $table->foreignId("p_id")->constrained("parcours");
            $table->foreignId("sem_id")->constrained("semestres");
            $table->foreignId("niv_id")->constrained("niveaux");
            $table->foreignId("ec_ens_id")->constrained("ec_ens");
            $table->foreignId("ens_id")->constrained("enseignants");
            $table->foreignId("salle_id")->constrained("salles");
            $table->boolean("valide")->default(0);
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
        Schema::table("regroupements" , function (Blueprint $table) {
            $table->dropConstrainedForeignId("p_id");
            $table->dropConstrainedForeignId("sem_id");
            $table->dropConstrainedForeignId("niv_id");
            $table->dropConstrainedForeignId("ec_ens_id");
            $table->dropConstrainedForeignId("ens_id");
            $table->dropConstrainedForeignId("salle_id");
        });
        Schema::dropIfExists('regroupements');
    }
}
