<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatetableEVT1 extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('EVT1', function (Blueprint $table) {
            $table->integer('TeamId');
            $table->integer('Result');
            $table->integer('IsPresent');
            $table->engine = 'InnoDB';
        });

        
        Schema::table('EVT1', function (Blueprint $table){
            $table->integer('Parti_id')->unsigned();
            $table->foreign('Parti_id')->references('id')->on('participants');
            $table->engine = 'InnoDB';
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
