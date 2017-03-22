<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategoriesTableSeeder extends Seeder
{
    
    public function run()
    {
        DB::table('categories')->insert([
            'name' => 'Sports',
            'description' => 'Sport news',
        ]);
        DB::table('categories')->insert([
            'name' => 'Science',
            'description' => 'Science news',
        ]);
        DB::table('categories')->insert([
            'name' => 'Politics',
            'description' => 'Politics news',
        ]);
    }
}
