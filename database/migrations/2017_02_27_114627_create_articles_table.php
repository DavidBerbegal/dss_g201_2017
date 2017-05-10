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
            $table->string('author')->nullable();
            $table->string('title');
            $table->string('description')->nullable();
            $table->string('urlNew');
            $table->string('urlImg')->nullable();
            $table->string('date');
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
            $table->timestamps('created_at');
            //$table->rememberToken();
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
