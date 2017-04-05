<?php
//comentario de prueba
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'business',
            'description' => 'Business news',
        ]);
        DB::table('categories')->insert([
            'name' => 'entertainment',
            'description' => 'Entertainment news',
        ]);
        DB::table('categories')->insert([
            'name' => 'general',
            'description' => 'General news',
        ]);
        DB::table('categories')->insert([
            'name' => 'gaming',
            'description' => 'Gaming news',
        ]);
        DB::table('categories')->insert([
            'name' => 'music',
            'description' => 'Music news',
        ]);
        DB::table('categories')->insert([
            'name' => 'science-and-nature',
            'description' => 'Science and nature news',
        ]);
        DB::table('categories')->insert([
            'name' => 'politics',
            'description' => 'Politics news',
        ]);
        DB::table('categories')->insert([
            'name' => 'sports',
            'description' => 'Sports news',
        ]);
        DB::table('categories')->insert([
            'name' => 'technology',
            'description' => 'Technology news',
        ]);
        DB::table('categories')->insert([
            'name' => 'empty',
            'description' => 'All categories are shown',
        ]);
    }
}
