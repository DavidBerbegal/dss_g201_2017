<?php

use Illuminate\Database\Seeder;

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
            'user' => 1,
            'new' => 'sport-news-001',
            'createdOn' => '2017-1-2'
        ]);
        DB::table('bookmarks')->insert([
            'user' => 3,
            'new' => 'sport-news-001',
            'createdOn'=> '2017-31-1'
        ]);

    }
}
