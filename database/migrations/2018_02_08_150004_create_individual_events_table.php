<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndividualEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('individual_events', function (Blueprint $table) {
            $table->integer('TeamId')->nullable();
            $table->integer('Result')->nullable();
            $table->boolean('isPresent')->default(0);
            $table->timestamps();
        });

        Schema::table('individual_events', function (Blueprint $table) {
            $table->integer('Parti_id')->unsigned();
            $table->foreign('Parti_id')->references('id')->on('participants');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('individual_events');
    }
}
