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
        DB::table('sourcesubscriptions')->insert([
            'user_id' => 1,
            'source_id' => 1        
        ]);
        DB::table('sourcesubscriptions')->insert([
            'user_id' => 3,
            'source_id' => 2        
        ]);
        DB::table('sourcesubscriptions')->insert([
            'user_id' => 2,
            'source_id' => 3        
        ]);
    }
}
