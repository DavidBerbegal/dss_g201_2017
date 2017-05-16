<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


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

        $this->call(CategoriesTableSeeder::class);
        $this->command->info('Categories table seeded');

        $this->call(SourcesTableSeeder::class);
        $this->command->info('Sources table seeded');

        $this->call(ForoTableSeeder::class);
        $this->command->info('Foro table seeded');

        $this->call( ArticlesTableSeeder::class );
        $this->command->info('Articles table seeded');

        $this->call(BookmarksTableSeeder::class);
        $this->command->info('Bookmarks table seeded');
        
        $this->call(SourcesubscriptionsTableSeeder::class);
        $this->command->info('Sourcesubscriptions table seeded');

        $this->call(CategorysubscriptionsTableSeeder::class);
        $this->command->info('Categorysubscriptions table seeded');
    }
}
