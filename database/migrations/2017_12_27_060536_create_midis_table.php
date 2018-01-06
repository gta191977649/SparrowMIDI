<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMidisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    /*
           "title" => $request['title'],
            "singer" => $request['singer'],
            "composer" => $request['composer'],
            "cat" => $request['cat'],
            "tag" => $request['tag'],
            "description" => $request['description'],
    */
    public function up()
    {
        Schema::create('midis', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('title');
            $table->string('singer');
            $table->string('composer');
            $table->integer('cat_id');
            $table->integer('rate')->default(0);
            $table->string('tag')->nullable();
            $table->string('ongen')->nullable();
            $table->text('description')->nullable();
            $table->text('file');
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
        Schema::dropIfExists('midis');
    }
}
