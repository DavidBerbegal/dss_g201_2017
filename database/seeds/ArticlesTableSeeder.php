<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

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
                            if(empty($article->publishedAt)){
                                $date = Carbon::now();
                            }
                            else{
                                $date = $article->publishedAt;
                            }

                            $sourceId = DB::table('sources')->where('name', $source->name)->first()->id;
                            $catId = DB::table('categories')->where('name', $source->category)->first()->id;

                            DB::table('articles')->insert([
                            'author' => $author, 
                            'title' => $article->title,
                            'description' => $article->description, 
                            'urlNew' => $article->url, 
                            'urlImg' => $article->urlToImage,
                            'date' => $date,

                            //de momento se generan aleatoriamente
                            'positiveRate' => rand(50, 5000),
                            'negativeRate' => rand(0, 300),

                            'category_id' => $catId,
                            'source_id' => $sourceId,
                            'language' => $source->language,
                            'country' => $source->country
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
