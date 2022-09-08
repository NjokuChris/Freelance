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
        Schema::create('freelances', function (Blueprint $table) {
            $table->id();
            $table->string('full_name')->nullable()->unique();
            $table->string('f_name');
            $table->string('m_name')->nullable();
            $table->string('l_name');
            $table->unsignedInteger('unit_id')->nullable();
            $table->unsignedInteger('location_id')->nullable();
            $table->unsignedInteger('posted_by')->nullable();
            $table->foreign('unit_id')->references('id')->on('unit');
            $table->foreign('location_id')->references('id')->on('state');
            $table->foreign('posted_by')->references('id')->on('users');
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
        Schema::dropIfExists('freelances');
    }
};
