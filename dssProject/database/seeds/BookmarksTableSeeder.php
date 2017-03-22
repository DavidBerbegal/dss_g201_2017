<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        

        //Añadimos entradas de prueba
        DB::table('bookmarks')->insert([
            'user_id' => 1,
            'article_id' => 1
        ]);
        DB::table('bookmarks')->insert([
            'user_id' => 3,
            'article_id' => 1
        ]);

    }
}
