<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call( NewsTableSeeder::class );
        // Mostramos información por consola 
        $this->command->info('News table seeded');
       
       //mostrar contenido de la DB, en este caso el idNew
        $news = DB::table('news')->get(); // select * from news
        foreach($news as $new) {
        var_dump($new->idNew); }
    }
}
