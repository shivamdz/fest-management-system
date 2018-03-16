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
        Schema::create('event_heads',function (Blueprint $table) {
            $table->increments('id');
            $table->string('HeadId');
            $table->string('HeadName');
            $table->bigInteger('HeadNo')->nullable();
            $table->string('HeadEmail')->nullable();
            $table->timestamps();
        });

        Schema::table('event_heads', function (Blueprint $table) {
        $table->integer('Event_id')->unsigned();
        $table->foreign('Event_id')->references('id')->on('events');
        });
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
