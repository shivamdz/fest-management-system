<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateParticipantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('participants')){
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('PartiId');
            $table->string('PartiName');
            $table->string('Email');
            $table->bigInteger('PartiNo');
            $table->engine = 'InnoDB';
        });}

        if(!Schema::hasColumn('participants','CId')){
        Schema::table('participants', function ($table){
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
        Schema::dropIfExists('participants');
    }
}
