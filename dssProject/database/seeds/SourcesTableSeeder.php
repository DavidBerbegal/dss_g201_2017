<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class SourcesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sources')->insert([
            'name' => 'BBC',
            'description' => 'International news web',
            'url' => 'www.bbc.com/news',
            'urlLogoSmall' => '',
            'urlLogoMedium' => ''
        ]);
        DB::table('sources')->insert([
            'name' => 'theguardian',
            'description' => 'International news web 2',
            'url' => 'https://www.theguardian.com/international',
            'urlLogoSmall' => '',
            'urlLogoMedium' => ''
        ]);
        DB::table('sources')->insert([
            'name' => 'cnn',
            'description' => 'International news web 3',
            'url' => 'edition.cnn.com',
            'urlLogoSmall' => '',
            'urlLogoMedium' => ''
        ]);
    }
}
