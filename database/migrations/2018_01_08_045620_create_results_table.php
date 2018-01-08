<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        

        if(!Schema::hasTable('results')){
        Schema::create('results', function (Blueprint $table) {
            $table->string('TotalScore');
            $table->engine = 'InnoDB';
        });}

        if(!Schema::hasColumn('results','CId')){
        Schema::table('results', function ($table){
            $table->string('CId');
            $table->foreign('CId')->references('CId')->on('Colleges');
            $table->engine = 'InnoDB';
        });}
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('results');
    }
}
