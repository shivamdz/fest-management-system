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
        Schema::create('volunteers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('VolId');
            $table->string('VolName');
            $table->bigInteger('VolNo');
            $table->string('VolEmail');
            $table->timestamps();
        });

        Schema::table('volunteers', function (Blueprint $table) {
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
        Schema::dropIfExists('volunteers');
    }
}
