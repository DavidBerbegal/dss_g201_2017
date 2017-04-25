<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->truncate();
        DB::table('sourcesubscriptions')->truncate();
        DB::table('categorysubscriptions')->truncate();
        DB::table('articles')->truncate();
        DB::table('users')->truncate();
        DB::table('categories')->truncate();
        DB::table('sources')->truncate();
    }
}
