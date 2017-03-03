<?php

namespace Tests\Unit;

use App\News;
use App\User;
use App\Bookmark;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExampleTest extends TestCase
{
    public function testBasicTest()
    {
        $this->assertTrue(true);
    }

    public function testInsercionNews()
    {
        $this->assertDatabaseHas('news', [
        'idNew' => 'sport-news-001']);
    }

    /*
    public function testBorrarBookmark()
    {
        // Creo una noticia, un usuario y un bookmark asociados entre si
        $noticia = new News();
        $noticia->idNew = '10';
        $noticia->author = 'David';
        $noticia->title = 'Noticia de prueba';
        $noticia->date = '03/03/17';
        $noticia->description = 'Descripcion';
        $noticia->urlNew = 'url';
        $noticia->urlImg = 'url';
        $noticia->positiveRate = 5;
        $noticia->negativeRate = 2;
        $noticia->source = 'source';
        $noticia->category = 'categoría';
        $noticia->language = 'lenguaje';
        $noticia->country = 'pais';
        $noticia->save();

        $usuario = new User();
        $usuario->idUser = '10';
        $usuario->password = 'password';
        $usuario->email = 'email';
        $usuario->name = 'nombreUsuario';
        $usuario->save();

        $bookmark = new Bookmark();
        $bookmark->noticia()->associate($noticia->idNew);
        $bookmark->usuario()->associate($usuario->idUser);
        $bookmark->createdOn = '3/3/17';
        $bookmark->save();

        // Creo identificadores para verificar que los datos siguen existiendo
        $idNoticia = $noticia->idNew;
        $idUsuario = $usuario->idUser;
        $idBookmark = $bookmark->idBookmark;

        // Comprobamos que se han relacionado los datos creados
        $bookmarkTestNoticia = Bookmark::where('new', $idNoticia)->get();
        $bookmarkContarNoticia = $bookmarkTestNoticia->count();
        $this->assertEquals($bookmarkContarNoticia, '10');

        $bookmarkTestUsuario = Bookmark::where('user', idUsuario)->get();
        $bookmarkContarUsuario = $bookmarkTestUsuario->count();
        $this->assertEquals(bookmarkContarUsuario, '10');
    }
    */
}
