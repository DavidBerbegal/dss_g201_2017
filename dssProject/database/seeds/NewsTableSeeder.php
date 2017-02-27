<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //borramos los datos de la tabla
        DB::table('news')->delete();
        // Añadimos una entrada a esta tabla
        DB::table('news')->insert([
        'idNew' => 'sport-news-001',
        'author' => 'Charles Dickens', 
        'title' => 'Title prueba 1',
        'description' => 'Descripiton prueba 1', 
        'urlNew' => 'www.prueba1.com', 
        'urlImg' => 'www.prueab1/img.com',
        'date' => '2016-11-11',
        'positiveRate' => '1000',
        'negativeRate' => '180',
        'source' => 'BBC News',
        'category' => 'sports',
        'language' => 'en',
        'country' => 'Spain'
         ]);
    }
}
