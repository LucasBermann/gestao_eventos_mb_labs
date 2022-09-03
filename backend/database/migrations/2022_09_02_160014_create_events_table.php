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
            $table->id();
            $table->string('description');
            $table->string('category');
            $table->string('location');
            $table->timestamp('eventDateTime');
            $table->bigInteger('participantsLimit');
            $table->bigInteger('price');
            $table->bigInteger('ageMin');
            $table->unsignedBigInteger('user_registration_id')->required();
            $table->unsignedBigInteger('company_id')->required();
            $table->timestamps();
        });

        Schema::table('events', function (Blueprint $table) {
            $table->foreign('user_registration_id')->references('id')->on('users');
        });
        Schema::table('events', function (Blueprint $table) {
            $table->foreign('company_id')->references('id')->on('companies');
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
