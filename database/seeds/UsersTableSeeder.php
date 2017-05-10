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
        
        
        $nombres = ['admin', 'antonio', 'pedro', 'jose', 'maria', 'david', 'marcelo',
                    'adrian', 'alvaro', 'leonardo', 'marta', 'julian', 'angela',
                    'natalia', 'manuel', 'enrique', 'eva', 'eric', 'nestor', 
                    'oscar', 'ofelia', 'olivia', 'daniel', 'diana', 'dolores',
                    'domingo', 'lucia', 'laura', 'leonor', 'leticia', 'lidia',
                    'lucio', 'luis', 'jorge', 'javier', 'lucas', 'lorenzo', 'fernando',
                    'pablo', 'paloma', 'pilar', 'jacinto', 'gema', 'gracia', 'gaspar',
                    'gabriel', 'gregorio'];

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
