<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReviewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->integer('uniform')->nullable();
            $table->string('uniform_comment')->nullable();
            $table->integer('hygience')->nullable();
            $table->string('hygience_comment')->nullable();
            $table->integer('respectful')->nullable();
            $table->string('respectful_comment')->nullable();
            $table->integer('teamwork')->nullable();
            $table->string('teamwork_comment')->nullable();
            $table->integer('adaptability')->nullable();
            $table->string('adaptability_comment')->nullable();
            $table->integer('dependability')->nullable();
            $table->string('dependability_comment')->nullable();
            $table->integer('attention_to_safety')->nullable();
            $table->string('attention_to_safety_comment')->nullable();
            $table->integer('integrity')->nullable();
            $table->string('integrity_comment')->nullable();
            $table->integer('ability_to_tolerate_stress')->nullable();
            $table->string('ability_to_tolerate_stress_comment')->nullable();
            $table->integer('decision_making')->nullable();
            $table->string('decision_making_comment')->nullable();
            $table->integer('assertiveness')->nullable();
            $table->string('assertiveness_comment')->nullable();
            });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('reviews');
    }
}
