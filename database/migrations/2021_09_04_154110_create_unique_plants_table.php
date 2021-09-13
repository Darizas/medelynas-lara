<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUniquePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('unique_plants', function (Blueprint $table) {
            $table->id();
            $table->integer('age');
            $table->integer('height');
            $table->integer('health');
            $table->unsignedBigInteger('plant_id');
            $table->foreign('plant_id')->references('id')->on('plant_types');
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
        Schema::dropIfExists('unique_plants');
    }
}
