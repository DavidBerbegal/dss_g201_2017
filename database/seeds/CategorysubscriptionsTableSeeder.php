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
        /*
        for($i = 1; $i < 20; $i++){
            for($j = 1; $j < 4; $j++){
                DB::table('categorysubscriptions')->insert([
                    'user_id' => $i,
                    'category_id' => $j       
                ]);
            }

            $i++;
            for($j = 4; $j < 8; $j++){
                DB::table('categorysubscriptions')->insert([
                    'user_id' => $i,
                    'category_id' => $j       
                ]);   
            }
        }
        */
    }
}
