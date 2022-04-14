<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCatalogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('catalogs', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedInteger('id1c');
            $table->string('articul', 80);
            $table->unsignedBigInteger('size');
            $table->unsignedBigInteger('mgroup_id');
            $table->unsignedBigInteger('specifications');
            $table->unsignedBigInteger('metal');
            $table->unsignedInteger('trymetal');
            $table->string('descr', 255);
            $table->string('img', 255);
            $table->string('name', 255);
            $table->string('fullname', 255);
            $table->unsignedInteger('balance');
            $table->softDeletes();
            $table->unique('id1c');
            $table->unique('articul');
            $table->foreign('mgroup_id')->references('id')->on('mgroups');
            $table->foreign('specifications')->references('id')->on('features');
            $table->foreign('metal')->references('id')->on('features');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('catalogs');
    }
}
