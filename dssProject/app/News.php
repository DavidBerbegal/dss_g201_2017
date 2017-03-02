<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model
{
   protected $table='news';
   protected $primaryKey= 'idNew';
   private $author;
   private $title;
   private $date;
   private $description;
   private $urlNew;
   private $urlImg;
   private $positiveRate;
   private $negativeRate;
   private $source;
   private $category;
   private $language;
   private $country;

}
