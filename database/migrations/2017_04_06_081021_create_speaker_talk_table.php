<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpeakerTalkTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('speaker_talk', function (Blueprint $table) {
            $table->increments('id')->unsigned();
            $table->integer('speaker_id')->unsigned()->index();
            $table->foreign('speaker_id')->references('id')->on('speakers')->onDelete('cascade');
            $table->integer('talk_id')->unsigned()->index();
            $table->foreign('talk_id')->references('id')->on('talks')->onDelete('cascade');
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
        Schema::drop('speaker_talk');
    }
}
