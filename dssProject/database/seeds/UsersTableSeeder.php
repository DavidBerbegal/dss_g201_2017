<?php

use Illuminate\Database\Seeder;

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
        DB::table('users')->delete();

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
