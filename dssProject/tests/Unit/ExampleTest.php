<?php

namespace Tests\Unit;

use App\News;
use App\User;
use App\Bookmark;
use App\Article;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TestPrueba extends TestCase
{
   

    public function testQueryDatabase()
    {
        $this->assertDatabaseHas('articles', [
        'articleName' => 'sport-news-001']);
    } 
    public function testBookmarTokUser()
    {
        
        $user = Bookmark::find(1)->first()->user->name;
        $this->assertEquals('Username', $user ); 
    }
    public function testBookmarkToArticle()
    {
        $article = Bookmark::find(1)->first()->article->description;
        $this->assertEquals('Descripiton prueba 1', $article ); 
    }

    public function testUserToCategoryThroughSubscription()
    {
        $category = User::find(1)->first()->categorysubscriptions->first()->category->name;
        $this->assertEquals('Sports', $category ); 
    }

    public function testUserToSourceThroughSubscription()
    {
        $source = User::find(1)->first()->sourcesubscriptions->first()->source->name;
        $this->assertEquals('BBC', $source ); 
    }

    public function testArticleToCategory(){
        $category = Article::find(1)->first()->category->name;
        $this->assertEquals('Sports', $category ); 
    }

    public function testArticleToSource(){
        $source = Article::find(1)->first()->source->name;
        $this->assertEquals('BBC', $source );
    }
}
