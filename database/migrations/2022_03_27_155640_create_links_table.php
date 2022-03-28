<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('url')->unique();
            $table->string('target');
            $table->bigInteger('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('domain_id')->unsigned();
            $table->foreign('domain_id')->references('id')->on('domains')->onDelete('cascade');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('links');
    }
};
