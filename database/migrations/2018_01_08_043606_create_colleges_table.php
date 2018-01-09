<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCollegesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        if(!Schema::hasTable('colleges')){
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CId');
            $table->string('CName');
            $table->string('CCity');
            $table->string('CState');
            $table->string('CRepName');
            $table->bigInteger('CNo');
            $table->string('CEmail');
            $table->string('Status');
            $table->integer('CTotal');
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
        Schema::dropIfExists('colleges');
    }
}
