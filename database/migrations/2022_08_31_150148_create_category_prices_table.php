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
        Schema::create('category_prices', function (Blueprint $table) {
            $table->id();
            $table->string('cat_price_name')->unique();
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('formation_id');
            $table->unsignedInteger('posted_by')->nullable();
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('story_categories');
            $table->foreign('formation_id')->references('id')->on('story_formations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('category_prices');
    }
};
