<?php

use Illuminate\Database\Seeder;

class ForoTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $comentarios = ['Comentario sobre informática', 'Comentario sobre deportes',
        'Comentario sobre naturaleza', 'Comentario sobre política', 'Comentario sobre ciencia'];

        foreach($comentarios as $comentario){

            DB::table('foro')->insert([
                'titulo' => $comentario,
                'comentario' => $comentario . 'comentario sobre el artículo anterior'
            ]);
        }
    }
}
