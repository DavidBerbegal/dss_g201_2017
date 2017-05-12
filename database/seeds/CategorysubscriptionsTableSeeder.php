<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class CategorysubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        
        for($i = 1; $i < 7; $i++){
                DB::table('categorysubscriptions')->insert([
                    'user_id' => 4,
                    'category_id' => $i     
                ]);
            
        }     
    }
}
