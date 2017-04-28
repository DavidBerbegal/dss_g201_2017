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
body{ padding-top: 70px;}
</style>
</head>
<body>
<nav class="navbar navbar-inverse  navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="{{ url('/') }}"><img src="{{url('/images/logo.png')}}" alt ="Image" height="25" width="25"/> </img></a>
    </div>
    <ul class="nav navbar-nav">
    <li><a href="{{ url('/admin') }}">Admin</a></li>
    <li><a href="{{ url('/feed') }}">Feed</a></li>
      <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">Categories<span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="#">General</a></li>
          <li><a href="#">Business</a></li>
          <li><a href="#">Entertainment</a></li>
          <li><a href="#">Gaming</a></li>
          <li><a href="#">Music</a></li>
          <li><a href="#">Science and nature</a></li>
          <li><a href="#">Politics</a></li>
          <li><a href="#">Sport</a></li>
          <li><a href="#">Technology</a></li>
        </ul>
      </li>
      <li><a href="/fuentesPub">Sources</a></li>
      @if(Auth::check())
      <li><a href="/fuentesPub">Bookmarks</a></li>
      @endif
      <li><form class="navbar-form navbar-left">
        <div class="input-group">
            <input type="text" class="form-control" placeholder="Search news...">
            <div class="input-group-btn">
            <button class="btn btn-default" type="submit">
            <i class="glyphicon glyphicon-search"></i>
            </button>
        </div>
    </div>
    </form></li>
    </ul>

    @if(Auth::check())
    <ul class="nav navbar-nav navbar-right">
      <li><a href="/profile"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-out"></span> Log out</a></li>
    </ul>
    @else
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
      <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    </ul>
    @endif
  </div>
</nav>

</body>
</html>