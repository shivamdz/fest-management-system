<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVolunteersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if(!Schema::hasTable('volunteers')){
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('VolId');
            $table->string('VolName');
            $table->bigInteger('VolNo');
            $table->engine = 'InnoDB';
        });}
    
        if(!Schema::hasColumn('volunteers','EventId')){
        Schema::table('volunteers', function ($table){
         $table->string('EventId');
         $table->foreign('EventId')->references('EventId')->on('events');
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
        Schema::dropIfExists('volunteers');
    }
}
