<?php

use Illuminate\Database\Seeder;

class InitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bookmarks')->delete();
        DB::table('news')->delete();
        DB::table('users')->truncate();
    }
}
