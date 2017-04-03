<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategorysubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categorysubscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('category_id');
            $table->unique(['user_id','category_id']);
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');;
            $table->foreign('category_id')->references('id')->on('categories')
                ->onDelete('cascade');;
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
        Schema::dropIfExists('categorysubscriptions');
        Schema::enableForeignKeyConstraints();
    }
}
