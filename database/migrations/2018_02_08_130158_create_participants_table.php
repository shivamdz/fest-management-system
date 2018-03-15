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
        Schema::create('participants', function (Blueprint $table) {
            $table->increments('id');
            $table->string('PartiId');
            $table->string('PartiName');
            $table->string('PartiEmail');
            $table->bigInteger('PartiNo');
            $table->timestamps();
        });

        Schema::table('participants', function (Blueprint $table) {
        $table->integer('Col_id')->unsigned();
        $table->foreign('Col_id')->references('id')->on('colleges');
        });
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
