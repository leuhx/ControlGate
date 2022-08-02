<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visits', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('visitor_id')->length(10)->unsigned();
            $table->foreign('visitor_id')->references('id')->on('visitors');

            $table->integer('user_id')->length(10)->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');

            $table->integer('department_id')->length(10)->unsigned();
            $table->foreign('department_id')->references('id')->on('departments');

            $table->string('status');

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
        Schema::dropIfExists('visits');
    }
};
