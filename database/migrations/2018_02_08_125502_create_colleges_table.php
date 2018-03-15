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
        Schema::create('colleges', function (Blueprint $table) {
            $table->increments('id');
            $table->string('CId');
            $table->string('CName');
            $table->string('CCity');
            $table->string('CState');
            $table->string('CRepName');
            $table->bigInteger('CNo');
            $table->string('CEmail');
            $table->boolean('FeeStatus');
            $table->boolean('RegStatus');
            $table->integer('CTotal');
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
        Schema::dropIfExists('colleges');
    }
}
