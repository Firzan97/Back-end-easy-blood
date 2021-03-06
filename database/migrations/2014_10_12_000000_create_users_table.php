<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id("user_id");
            $table->string('username');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('bloodType');
            $table->string('phoneNumber');
            $table->username('age');
            $table->string('gender');
            $table->double('latitude');
            $table->double('longitude');
            $table->string('imageURL');
            $table->double('weight');
            $table->double('height');
            $table->string('role');
            $table->boolean('isOnline');
            $table->string('notificationToken');
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
