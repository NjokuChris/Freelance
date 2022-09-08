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
        Schema::create('story_contributors', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('story_id');
            $table->unsignedInteger('freelancer_id');
            $table->float('amount');
            $table->timestamps();
            $table->foreign('story_id')->references('id')->on('stories');
            $table->foreign('freelancer_id')->references('id')->on('freelancers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('story_contributors');
    }
};
