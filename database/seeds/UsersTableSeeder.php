<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Borramos el contenido que hubiera en la tabla

        //Añadimos entradas de prueba
        
        
        $nombres = ['david', 'leo', 'adri', 'alvaro', 'carlos'];

        foreach($nombres as $nombre){

            DB::table('users')->insert([
                'name' => $nombre,
                'email' => $nombre . '@gmail.com',
                'password' => bcrypt($nombre . 'Pass'),
                'privilegios' => 'administrador'
            ]);
        }
    }
}
