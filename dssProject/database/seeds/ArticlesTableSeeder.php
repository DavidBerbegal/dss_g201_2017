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
        //hacemos la consulta http a la api
         $content = file_get_contents("https://newsapi.org/v1/articles?source=bbc-news&sortBy=top&apiKey=a522b74c74f64e2daa03511d0e80ae6f");
         
        //insertamos el contenido resultante de la consulta en un objeto JSON
        $jsonContent = json_decode($content);   
         
         //comprobamos que el estado de la consulta http ha sido "ok" (200)
         if ($jsonContent->status = "ok"){

            foreach ($jsonContent->articles as $article) {
                //echo $article->title;
                    
                    DB::table('articles')->insert([
                    'author' => $article->author, 
                    'title' => $article->title,
                    'description' => $article->description, 
                    'urlNew' => $article->url, 
                    'urlImg' => $article->urlToImage,
                    'date' => $article->publishedAt,
                    'positiveRate' => '0',
                    'negativeRate' => '0',
                    'category_id' => '1',
                    'source_id' => '1',
                    'language' => 'en',
                    'country' => 'Spain'
                    ]);   
            }
         }
         else{
             echo "La consulta HTTP a la API ha fallado";
         }
    }
}
