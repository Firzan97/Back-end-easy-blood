<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->timestamps();
            $table->string("name");
            $table->string("location");
            $table->string("phoneNum");
            $table->date("dateStart");
            $table->date("dateEnd");
            $table->String("organizer");
            $table->dateTime("timeStart");
            $table->dateTime("timeEnd");
            $table->string("imageURL");
            $table->foreignId("user_id");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('events');
    }
}
