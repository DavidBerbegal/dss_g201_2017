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
        
        for($i = 1; $i < 15; $i++){
                DB::table('sourcesubscriptions')->insert([
                    'user_id' => 4,
                    'source_id' => $i      
                ]);
            
        }
        
    }
}
