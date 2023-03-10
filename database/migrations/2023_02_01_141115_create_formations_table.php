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
        Schema::create('formations', function (Blueprint $table) {
            $table->id();
            $table->string("nom", 150);
            $table->integer("duree");
            $table->text("description");
            $table->boolean("isStarted");
            $table->datetime("date_debut");
            $table->bigInteger('referentiel_id')->unsigned()->index()->nullable();
            $table->foreign('referentiel_id')->references('id')->on('referentiels')->onDelete('cascade');
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
        Schema::dropIfExists('formations');
    }
};
