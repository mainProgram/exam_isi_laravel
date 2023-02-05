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
        Schema::create('candidats_formations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBiginteger('candidat_id')->unsigned();
            $table->unsignedBiginteger('formation_id')->unsigned();
            $table->foreign('candidat_id')->references('id')
                 ->on('candidats')->onDelete('cascade');
            $table->foreign('formation_id')->references('id')
                ->on('formations')->onDelete('cascade');
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
        Schema::dropIfExists('candidats_formations');
    }
};
