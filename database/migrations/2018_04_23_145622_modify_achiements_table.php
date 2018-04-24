<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ModifyAchiementsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('achievements', function (Blueprint $table) {
            $table->dropColumn(['article_scopus', 'proceeding_scopus', 'article_other', 'proceeding_other', 'citation_scopus', 'book', 'copyright', 'sinta_account', 'total_staff']);
            $table->integer('category_id')->unsigned();
            $table->string('name');
            $table->integer('value')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {

    }
}
