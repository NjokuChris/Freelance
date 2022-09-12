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
            $table->unsignedBigInteger('category_id');
            $table->float('amount');
            $table->foreign('category_id')->references('id')->on('story_categories');
            $table->unsignedBigInteger('formation_id');
            $table->foreign('formation_id')->references('id')->on('story_formations');
            $table->unsignedBigInteger('posted_by')->nullable();
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
        Schema::dropIfExists('category_prices');
    }
};
