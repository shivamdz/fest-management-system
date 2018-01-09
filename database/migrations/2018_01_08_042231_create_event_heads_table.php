<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventHeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        if(!Schema::hasTable('events')){
            Schema::create('event_heads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('HeadId');
            $table->string('HeadName');
            $table->bigInteger('Contact');
            $table->string('Email');
            $table->engine = 'InnoDB';
        });}


        if(!Schema::hasColumn('event_heads','EventId')){
         Schema::table('event_heads', function ($table){
         $table->string('EventId');
         $table->foreign('EventId')->references('EventId')->on('Events');
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
        Schema::dropIfExists('event_heads');
    }
}
