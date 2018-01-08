<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        if(!Schema::hasTable('events')){
            Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EventId');
            $table->string('EventName');
            $table->string('EventDesc');
            $table->date('EventDate')->nullable();
            $table->time('EventStartTime')->nullable();
            $table->time('EventEndTime')->nullable();
            $table->string('EventVenue')->nullable();
            $table->string('Rules')->nullable();
            $table->integer('MaxTeam')->nullable();
            $table->integer('MaxParti')->nullable();
            $table->string('Pass')->nullable();
            $table->string('Path')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('events');
    }
}
