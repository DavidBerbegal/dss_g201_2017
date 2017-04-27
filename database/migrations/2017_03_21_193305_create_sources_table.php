<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sources', function (Blueprint $table) {
            $table->increments('id');
            $table->string('api');
            $table->unique('api');
            $table->string('name');
            $table->string('category');
            $table->string('description');
            $table->string('url');
            $table->string('urlLogoSmall');
            $table->string('urlLogoMedium');
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
        Schema::dropIfExists('sources');
        Schema::enableForeignKeyConstraints();
    }
}
