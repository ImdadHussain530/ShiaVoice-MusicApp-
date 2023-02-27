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
        Schema::create('musics', function (Blueprint $table) {
            $table->id('id');
            $table->string('title',500);
            $table->unsignedBigInteger('artist_id');
            $table->string('music');
            $table->string('music_type',50);
            $table->string('poster')->nullable();
            $table->boolean('feature')->default('1');
            $table->boolean('active')->default('1');
            $table->foreign('artist_id')->references('id')->on('artists')->onUpdate('cascade')
            ->onDelete('cascade');
            //feature
            //active
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
        Schema::dropIfExists('musics');
    }
};
