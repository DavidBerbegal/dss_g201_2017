<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SourcesubscriptionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i = 1; $i < 20; $i++){
            for($j = 1; $j < 4; $j++){
                DB::table('sourcesubscriptions')->insert([
                    'user_id' => $i,
                    'source_id' => $j       
                ]);
            }

            $i++;
            for($j = 4; $j < 8; $j++){
                DB::table('sourcesubscriptions')->insert([
                    'user_id' => $i,
                    'source_id' => $j       
                ]);   
            }
        }
    }
}
