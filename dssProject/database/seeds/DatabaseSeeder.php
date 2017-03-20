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
        //
        // Mostramos información por consola 
        
        $this->call(InitSeeder::class);
        $this->call(UsersTableSeeder::class);

        $this->command->info('Users table seeded');

        $this->call( NewsTableSeeder::class );
        $this->command->info('News table seeded');

        $this->call(BookmarksTableSeeder::class);
        $this->command->info('Bookmarks table seeded');
    }
}
