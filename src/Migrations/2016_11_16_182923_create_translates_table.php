<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTranslatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('translation-map', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type'); /*POST or PAGE*/
            $table->integer('translation_id'); /* POST or PAGE ID'S array */
            $table->timestamps();

        });

        Schema::create('locales', function (Blueprint $table) {
            $table->increments('id');
            $table->string('code');
            $table->string('fullname');
        });

        Schema::create('translates', function (Blueprint $table) {
            $table->increments('id');
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
        Schema::dropIfExists('translates');
    }
}
