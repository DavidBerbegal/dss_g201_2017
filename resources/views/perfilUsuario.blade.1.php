<!DOCTYPE html>

<html lang="{{ config('app.locale') }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

            
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="/css/estilos.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        @extends('header')
        <style>
            .thumbnail{
                width: 300px;
                height: 520px;
                overflow: auto;
                
            }
            .thumbnail img{
                width: 280px;
                height: 80px;
                display: block;
            }
        </style>
    </head>
    <body>
        <div class="container">
            <div class="row">
                <div class="col-6 col-md-4">
                    <div class="thumbnail">
                        <img src="http://i.newsapi.org/fox-sports-s.png" alt ="Image"/>
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p align="justify">Hacker News is a social news website focusing on computer science and entrepreneurship. It is run by Paul Graham's investment fund and startup incubator, Y Combinator. In general, content that can be submitted is defined as "anything that gratifies one's intellectual curiosity".</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>                      
                    </div>                
                </div>
                <div class="col-6 col-md-4">
                    <div class="thumbnail">
                        <img src="https://2oceansmeet.files.wordpress.com/2016/09/google-news-logo-square.png?w=300" alt ="Image" />
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p align="justify">News, analysis from the Middle East and worldwide, multimedia and interactives, opinions, documentaries, podcasts, long reads and broadcast schedule.</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>                      
                    </div>                
                </div>
                <div class="col-6 col-md-4">
                    <div class="thumbnail">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/0/0e/The_Guardian.svg/2000px-The_Guardian.svg.png" alt ="Image" />
                        <div class="caption">
                            <h3>Thumbnail label</h3>
                            <p align="justify">Sky news delivers breaking news, headlines and top stories from business, politics, entertainment and more in the UK and worldwide.</p>
                            <p><a href="#" class="btn btn-primary" role="button">Button</a> <a href="#" class="btn btn-default" role="button">Button</a></p>
                        </div>                      
                    </div>                
                </div>                        
                
            </div>
        </div>  
    </body>
</html>