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
        DB::table('categorysubscriptions')->insert([
            'user_id' => 1,
            'category_id' => 1       
        ]);

        DB::table('categorysubscriptions')->insert([
            'user_id' => 2,
            'category_id' => 2       
        ]);
    }
}
