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
        //hacemos la consulta http sobre las fuentes disponibles
        $fuentes = file_get_contents("https://newsapi.org/v1/sources?language=en");

        //introducimos el resultado de la consulta en un objeto JSON
        $jsonFuentes = json_decode($fuentes);   

        if($jsonFuentes->status = "ok"){
            
            foreach ($jsonFuentes->sources as $source){

                //hacemos la consulta http a la api sobre los artículos
                $contentArticles = file_get_contents("https://newsapi.org/v1/articles?source=" . $source->id . "&apiKey=a522b74c74f64e2daa03511d0e80ae6f");
                
                //insertamos el contenido resultante de la consulta en un objeto JSON
                $jsonContent = json_decode($contentArticles);   
                
                //comprobamos que el estado de la consulta http ha sido "ok" (200)
                if ($jsonContent->status = "ok"){

                    foreach ($jsonContent->articles as $article) {
                        //echo $article->title;
                            if(empty($article->author)){ 
                                $author = "Anonymous";
                            }
                            else{
                                $author = $article->author;
                            }

                            DB::table('articles')->insert([
                            'author' => $author, 
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
                            'country' => 'UK'
                            ]);   
                    }
                }
                else{
                    echo "La consulta HTTP a la API ha fallado";
                }
            }
        }
    }
}
