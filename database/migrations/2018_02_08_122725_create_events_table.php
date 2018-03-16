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
            $table->string('EventId');
            $table->string('EventDesc');
            $table->string('EventName');
            $table->datetime('EventStartDate');
            $table->datetime('EventEndDate');
            $table->string('EventVenue');
            $table->string('Rules');
            $table->integer('MaxTeam');
            $table->integer('MaxParti');
            $table->string('Pass');
            $table->string('Path');
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->integer('Fest_id')->unsigned();
            $table->foreign('Fest_id')->references('id')->on('fest');
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
