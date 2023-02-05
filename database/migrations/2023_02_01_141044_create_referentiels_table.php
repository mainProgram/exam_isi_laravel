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
        Schema::create('referentiels', function (Blueprint $table) {
            $table->id();
            $table->string("libelle", 150);
            $table->boolean("isValidated");
            $table->float("horaire");
            $table->bigInteger('type_id')->unsigned()->index()->nullable();
            $table->foreign('type_id')->references('id')->on('types')->onDelete('cascade');
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
        Schema::dropIfExists('referentiels');
    }
};
