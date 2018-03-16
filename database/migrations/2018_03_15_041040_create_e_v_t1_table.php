<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEVT1Table extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('EVT1', function (Blueprint $table) {
            $table->integer('TeamId')->nullable();
            $table->integer('Result')->nullable();
            $table->boolean('isPresent')->default(0);
            $table->timestamps();
        });

        Schema::table('EVT1', function (Blueprint $table) {
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
        Schema::dropIfExists('EVT1');
    }
}
