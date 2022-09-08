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
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date_publish');
            $table->unsignedInteger('page_no');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('formation_id');
            $table->unsignedInteger('posted_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('story_categories');
            $table->foreign('formation_id')->references('id')->on('story_formations');
            $table->foreign('posted_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stories');
    }
};
