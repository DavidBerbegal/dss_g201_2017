<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ForoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comentarios = ['Comentario sobre informática y todo lo relacionado con ella', 'Comentario sobre deportes y todo lo relacionado con ellos', 'Comentario sobre naturaleza y todo lo relacionado con ella', 'Comentario sobre política y todo lo relacionado con ella', 'Comentario sobre ciencia y todo lo relacionado con ella'];

        foreach($comentarios as $comentario){
            $date = Carbon::now();

            DB::table('foro')->insert([
                'comentario' => $comentario . ' Comentario sobre el artículo anterior. Con este comentario se quiere comprobar si el tamaño de las celdas de los comentarios es el correcto o necesita ser modificado. De no ser as
                será necesario modificar',
                'autor' => 'admin',
                'created_at' => $date
            ]);
        }
    }
}
