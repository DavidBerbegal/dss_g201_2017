<?php

namespace Tests\Unit;

use App\News;
use App\User;
use App\Bookmark;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestPrueba extends TestCase
{
   

    public function testInsercionNews()
    {
        $this->assertDatabaseHas('news', [
        'idNew' => 'sport-news-001']);
    }

    
    public function testUserBookmarkUser()
    {
        $bookmark = Bookmark::find(1);
        $this->assertTrue($bookmark->user == 1); 
    }
    public function testUserBookmarkNews()
    {
        $bookmark = Bookmark::find(1);
        $this->assertTrue($bookmark->new == 'sport-news-001'); 
    }
    
}
