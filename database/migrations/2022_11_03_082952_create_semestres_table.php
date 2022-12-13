<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSemestresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('semestres', function (Blueprint $table) {
            $table->id();
            $table->string("sem")->nullable();
            $table->foreignId("niveau_id")->constrained("niveaux");
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
        Schema::table("semestres" , function (Blueprint $table) {
            $table->dropConstrainedForeignId("niveau_id");
        });
        Schema::dropIfExists('semestres');
    }
}
