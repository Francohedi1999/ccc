<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParcoursTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcours', function (Blueprint $table) {
            $table->id();
            $table->string("p")->nullable();
            $table->boolean("p_")->default(0);
            $table->foreignId("sem_id")->constrained("semestres");
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
        Schema::table("parcours" , function (Blueprint $table) {
            $table->dropConstrainedForeignId("sem_id");
        });
        Schema::dropIfExists('parcours');
    }
}
