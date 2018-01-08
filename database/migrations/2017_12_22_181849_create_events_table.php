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
        Schema::create('events', function (Blueprint $table) {
            $table->increments('id');
            $table->string('EventId')->nullable();
            $table->string('EventName');
            $table->string('EventDesc');
            $table->string('EventDate')->nullable();
            $table->string('EventStartTime')->nullable();
            $table->string('EventEndTime')->nullable();
            $table->string('EventVenue')->nullable();
            $table->string('Rules')->nullable();
            $table->integer('MaxTeam')->nullable();
            $table->integer('MaxParti')->nullable();
            $table->string('Pass')->nullable();
            $table->string('Path')->nullable();
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
        Schema::dropIfExists('events');
    }
}
