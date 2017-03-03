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
   

    public function testQueryDatabase()
    {
        $this->assertDatabaseHas('news', [
        'idNew' => 'sport-news-001']);
    }

    
    public function testBookmarkUser()
    {
        $bookmark = Bookmark::find(1);
        $this->assertTrue($bookmark->user == 1); 
    }
    public function testBookmarkNews()
    {
        $bookmark = Bookmark::find(1);
        $this->assertTrue($bookmark->new == 'sport-news-001'); 
    }
    
}
