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
            $table->string('CRepName')->nullable();
            $table->bigInteger('CNo')->nullable();
            $table->string('CEmail')->nullable();
            $table->string('Comment')->default('none');
            $table->boolean('FeeStatus')->default(0);
            $table->integer('CTotal')->default(0);
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
