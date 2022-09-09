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
        Schema::enableForeignKeyConstraints();
        Schema::create('stories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->date('date_publish');
            $table->unsignedBigInteger('page_no');
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('formation_id');
            $table->unsignedBigInteger('posted_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('story_categories');

            $table->foreign('formation_id')->references('id')->on('story_formations');
            $table->foreign('posted_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('stories');
    }
};
