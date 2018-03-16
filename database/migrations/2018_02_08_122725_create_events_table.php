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
            $table->string('EventDesc')->nullable();
            $table->string('EventName')->nullable();
            $table->datetime('EventStartDate')->nullable();
            $table->datetime('EventEndDate')->nullable();
            $table->string('EventVenue')->nullable();
            $table->string('Rules')->nullable();
            $table->integer('MaxTeam')->nullable();
            $table->integer('MaxParti')->nullable();
            $table->string('Pass');
            $table->string('Path')->nullable();
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
