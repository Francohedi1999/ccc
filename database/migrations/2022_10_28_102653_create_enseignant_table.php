<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnseignantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enseignants', function (Blueprint $table) {
            $table->id();
            $table->string("nom")->nullable();
            $table->string("prenom")->nullable();
            $table->string("im")->nullable();
            $table->string("cin")->nullable();
            $table->string("email")->nullable();
            $table->string("adresse")->nullable();
            $table->string("contact")->nullable();
            $table->foreignId("code_id")->constrained("codes");
            $table->foreignId("grade_id")->constrained("grades");
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
        Schema::table("enseignants" , function (Blueprint $table) {
            $table->dropConstrainedForeignId("code_id");
            $table->dropConstrainedForeignId("grade_id");
        });
        Schema::dropIfExists('enseignant');
    }
}
