<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //Photo library 
        Schema::create('images', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('thumbnail');
            $table->integer('type'); //1-anh for slide; 2- images for loo; 3- image for viedo intro
            $table->timestamps();
        });

        //events
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_cover');
            $table->string('title');
            $table->string('slug');
            $table->text('content');
            $table->string('type');//1-event ; 2- staff event; 3- device event
            $table->bigInteger('user_id')->unsigned();
            $table->integer('status');
            $table->dateTime('start_day');
            $table->dateTime('end_day');
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
        //intro
        Schema::create('introduce', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });
        //intro team
        Schema::create('team', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->timestamps();
        });
        //conntact
        Schema::create('contacts', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->text('content');
            $table->string('name_company');
            $table->string('address');
            $table->string('store');
            $table->integer('phone');
            $table->string('email');
            $table->string('site');
            $table->timestamps();
        });
        //partner
        Schema::create('partner', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_prtner');
            $table->string('name');
            $table->timestamps();
        });
        //blog
        Schema::create('blog', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('photo_cover');
            $table->string('slug');
            $table->string('title');
            $table->text('content');
            $table->string('short_cut');
            $table->integer('status');
            $table->bigInteger('user_id')->unsigned();
            $table
                ->foreign('user_id')
                ->references('id')
                ->on('users');
            $table->timestamps();
        });
        Schema::create('custommer', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('slug');
            $table->string('avatar');
            $table->string('name');
            $table->text('comment');
            $table->string('work');
            $table->integer('status');
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
        //
    }
}
