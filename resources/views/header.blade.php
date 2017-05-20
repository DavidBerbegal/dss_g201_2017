<!doctype html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    @yield('title')

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

    @yield('css')
    <style>
      img{
          display: inline-block;
      }

      #myNavbar{
        overflow-y: auto;
        max-height:none;
      }

      @media (max-width: 1220px) {
          .navbar-header {
              float: none;
          }
          .navbar-toggle {
              display: block;
          }
          .navbar-collapse {
              border-top: 1px solid transparent;
              box-shadow: inset 0 1px 0 rgba(255,255,255,0.1);
          }
          .navbar-collapse.collapse {
              display: none!important;
          }
          .navbar-nav {
              float: none!important;
              margin: 7.5px -15px;
          }
          .navbar-nav>li {
              float: none;
          }
          .navbar-nav>li>a {
              padding-top: 10px;
              padding-bottom: 10px;
          }
          .navbar-text {
              float: none;
              margin: 15px 0;
          }
          .navbar-form {
            width: 90%;
            margin: 5px;
          }
          /* since 3.1.0 */
          .navbar-collapse.collapse.in { 
              display: block!important;
          }
          .collapsing {
              overflow: hidden!important;
          }
      }
      
      body{ padding-top: 70px;}
      
    </style>
  </head>
  <body>

    <nav class="navbar navbar-inverse  navbar-fixed-top">
      <div class="container-fluid">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>                       
          </button>
          <a class="navbar-brand" href="{{ url('/feed') }}">
            <img src="{{url('/images/logo.png')}}" alt ="Image" height="25" width="25"/></img>
          </a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            @if(Auth::user()['privilegios'] == "administrador")
              <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Admin<span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="{{ url('/articulos') }}">Artículos</a></li>
                    <li><a href="{{ url('/usuarios') }}">Usuarios</a></li>
                    <li><a href="{{ url('/categorias') }}">Categorías</a></li>
                    <li><a href="{{ url('/fuentes') }}">Fuentes</a></li>
                    <li><a href="{{ url('/suscripcion-categorias') }}">Suscrip-Categorías</a></li>
                    <li><a href="{{ url('/suscripcion-fuentes') }}">Suscrip-Fuentes</a></li>
                  </ul>
                </li>
            @endif

            <li><a href="{{ url('/feed') }}">Feed</a></li>
            <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
              <ul class="dropdown-menu">
                <li><a href="/buscaCategoria/3">General</a></li>
                <li><a href="/buscaCategoria/1">Business</a></li>
                <li><a href="/buscaCategoria/2">Entertainment</a></li>
                <li><a href="/buscaCategoria/4">Gaming</a></li>
                <li><a href="/buscaCategoria/5">Music</a></li>
                <li><a href="/buscaCategoria/6">Science and nature</a></li>
                <li><a href="/buscaCategoria/7">Politics</a></li>
                <li><a href="/buscaCategoria/8">Sport</a></li>
                <li><a href="/buscaCategoria/9">Technology</a></li>
              </ul>
            </li>
            <li><a href="/fuentesPub">Sources</a></li>
            @if(Auth::check())
              <li>
                <a href="/bookmarks">Bookmarks</a>
              </li> 
              <li>
                <a href="/foro">Foro</a>
              </li>
              <li>
                <a href="/suscriptionsSources">My Sources</a>
              </li>
               <li>
                <a href="/suscriptionsCategories">My Categories</a>
              </li>     
            @endif
          
              <form class="navbar-form navbar-left" action="{{ action('articulosController@searchFeed')}}" name="search"
                              method="GET">
                <div class="input-group">
                  <input type="text" name="sName" id="sName" class="form-control" placeholder="Search article...">
                  <div class="input-group-btn">
                    <button class="btn btn-default" type="submit">
                      <i class="glyphicon glyphicon-search"></i>
                    </button>
                  </div>
                </div>
              </form>
          </ul>
          @if(Auth::check())
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('/profile') }}"><span class="glyphicon glyphicon-user"></span> {{Auth::user()->name}}</a></li>
              <li>
                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                  <span class="glyphicon glyphicon-log-out"></span> 
                  Log out
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
              </li>
            </ul>
          @else
            <ul class="nav navbar-nav navbar-right">
              <li><a href="{{ url('/register') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
              <li><a href="{{ url('/login') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
            </ul>
          @endif
        </div>
      </div>
    </nav>
  </body>
</html>