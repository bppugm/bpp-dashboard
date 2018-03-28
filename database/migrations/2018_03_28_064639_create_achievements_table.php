<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAchievementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('achievements', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('article_scopus')->nullable();
            $table->integer('proceeding_scopus')->nullable();
            $table->integer('article_other')->nullable();
            $table->integer('proceeding_other')->nullable();
            $table->integer('citation_scopus')->nullable();
            $table->integer('book')->nullable();
            $table->integer('copyright')->nullable();
            $table->integer('sinta_account')->nullable();
            $table->integer('total_staff')->nullable();
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
        Schema::dropIfExists('achievements');
    }
}
