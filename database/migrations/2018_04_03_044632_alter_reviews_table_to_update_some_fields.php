<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterReviewsTableToUpdateSomeFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reviews', function (Blueprint $table) {
            $table->integer('reviewer')->unsigned();
            $table->integer('reviewee')->unsigned();
            $table->integer('attendance')->unsigned();
            $table->integer('tardies')->nullable();
            $table->integer('absences')->nullable();
            $table->integer('absence_hours')->nullable();
            $table->integer('maximum_allowable_absence_hours')->nullable();
            $table->integer('academic_achievement')->nullable();
            $table->integer('class_standing')->nullable();
            $table->float('academic_achievement_percent',8,4)->nullable();
            $table->integer('excellence_reports')->nullable();
            $table->integer('discrepancy_reports')->nullable();
            $table->string('disciplinary_actions')->nullable();
            $table->string('staff_comments')->nullable();
            $table->foreign('reviewer')->references('id')->on('users');
            $table->foreign('reviewee')->references('id')->on('users');
            $table->string('general_comments', 255)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
