<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->increments('id');
            $table->string('articleName');
            $table->unique('articleName');
            $table->string('author');
            $table->string('title');
            $table->string('description');
            $table->string('urlNew');
            $table->string('urlImg');
            $table->date('date');
            $table->integer('positiveRate');
            $table->integer('negativeRate');
            $table->string('language');
            $table->string('country');
            $table->string('source_id');
            $table->string('category_id');
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');;
            $table->foreign('source_id')->references('id')->on('sources')
                ->onDelete('cascade');
            //$table->rememberToken();
            $table->timestamps('created_at');
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
        Schema::dropIfExists('articles');
        Schema::enableForeignKeyConstraints();
    }
}
