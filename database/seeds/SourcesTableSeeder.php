<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fuentes = file_get_contents("https://newsapi.org/v1/sources?language=en");

        //introducimos el resultado de la consulta en un objeto JSON
        $jsonFuentes = json_decode($fuentes);   

        if($jsonFuentes->status = "ok"){
            
            foreach ($jsonFuentes->sources as $source){

                DB::table('sources')->insert([
                    'name'  => $source->name,
                    'api' => $source->id,
                    'category' => $source->category,
                    'description' => $source->description,
                    'url' => $source->url,
                    'urlLogoSmall' => $source->urlsToLogos->small,
                    'urlLogoMedium' => $source->urlsToLogos->medium
                ]);
            }
        }
    }
}

