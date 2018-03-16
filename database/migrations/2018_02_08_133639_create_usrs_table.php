<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsrsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usrs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('UserName');
            $table->string('Password');
            $table->string('Session')->nullable();

            $table->timestamps();
        });

        Schema::table('usrs', function (Blueprint $table) {
            $table->integer('Role_id')->unsigned();
            $table->foreign('Role_id')->references('id')->on('roles');
        });


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('usrs');
    }
}
