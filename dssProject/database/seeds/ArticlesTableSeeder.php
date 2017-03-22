<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ArticlesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //borramos los datos de la tabla
       
        // Añadimos una entrada a esta tabla
        DB::table('articles')->insert([
            'articleName' => 'sport-news-001',
            'author' => 'Charles Dickens', 
            'title' => 'Title prueba 1',
            'description' => 'Descripiton prueba 1', 
            'urlNew' => 'www.prueba1.com', 
            'urlImg' => 'www.prueab1/img.com',
            'date' => '2016-11-11',
            'positiveRate' => '1000',
            'negativeRate' => '180',
            'category_id' => 1,
            'source_id' => 1,
            'language' => 'en',
            'country' => 'Spain'
         ]);
    }
}
