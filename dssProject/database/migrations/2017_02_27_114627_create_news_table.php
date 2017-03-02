<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateNewsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->string('idNew');
            $table->primary('idNew');
            $table->string('author');
            $table->string('title');
            $table->string('description');
            $table->string('urlNew');
            $table->string('urlImg');
            $table->date('date');
            $table->integer('positiveRate');
            $table->integer('negativeRate');
            $table->string('source');
            $table->string('category');
            $table->string('language');
            $table->string('country');
            //$table->rememberToken();
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
        Schema::dropIfExists('news');
    }
}
