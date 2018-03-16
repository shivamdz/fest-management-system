<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFestTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fest', function (Blueprint $table) {
            $table->increments('id');
            $table->string('FestName');
            $table->string('FestInfo');
            $table->string('FestLogo')->nullable();
            $table->string('FestOrg');
            $table->integer('Total')->nullable();
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
        Schema::dropIfExists('fest');
    }
}
