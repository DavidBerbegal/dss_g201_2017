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
        DB::table('users')->insert([
            'name' => 'Username',
            'email' => 'email@gmail.com',
            'password' => 'ThePassword'
        ]);
        DB::table('users')->insert([
            'name' => 'Usuario',
            'email' => 'correo@gmail.com',
            'password' => 'PaSsWoRd'
        ]);
        DB::table('users')->insert([
            'name' => 'Nombre',
            'email' => 'prueba@gmail.com',
            'password' => 'Clave'
        ]);
    }
}
