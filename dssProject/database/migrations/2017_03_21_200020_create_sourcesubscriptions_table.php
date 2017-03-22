<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sourcesubscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->string('source_id');
            $table->unique('user_id','source_id');
            $table->foreign('user_id')->references('id')->on('users')
                ->onDelete('cascade');;
            $table->foreign('source_id')->references('id')->on('sources')
                ->onDelete('cascade');
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
        Schema::dropIfExists('sourcesubscriptions');
        Schema::enableForeignKeyConstraints();
    }
}
