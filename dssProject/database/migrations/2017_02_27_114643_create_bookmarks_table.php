<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookmarksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookmarks', function (Blueprint $table) {
            $table->increments('idBookmark');
            $table->integer('user');
            $table->string('new');
            $table->date('createdOn');
            $table->foreign('user')->references('idUser')->on('users');
            $table->foreign('new')->references('idNew')->on('news');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bookmarks', function (Blueprint $table){
            $table->dropForeign('users_idUser_foreign');
            $table->dropForeign('news_idNew_foreign');
        });
        Schema::dropIfExists('bookmarks');
    }
}
