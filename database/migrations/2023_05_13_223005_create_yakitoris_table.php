<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateYakitorisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('yakitoris', function (Blueprint $table) {
            $table->id();
            $table->datetime('timeSelect');
            $table->string('name',100);
            $table->string('tel');
            $table->integer('mix');
            $table->integer('breast');
            $table->integer('skin');
            $table->integer('tsukune');
            $table->integer('bonjiri');
            $table->integer('others');
            $table->integer('karaage');
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
        Schema::dropIfExists('yakitoris');
    }
}
