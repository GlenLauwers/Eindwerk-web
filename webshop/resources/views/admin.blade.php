<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="" />
    <title>{{ $title }}</title>

    <!-- Style -->
    <link href="{{ asset('/css/bootstrap.min.css') }} " rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <header class="admin">
      <div id="hoofding" class="hoofding row col-md-12 centered">
        <div class="logo col-md-4">
          <a href="{{ url('/admin-home') }}"><img src="{{ asset('/afbeeldingen/logo.png') }}" alt="logo"></a>
        </div>
      

      <div class="links">
          <div class="pull-right">
            <ul>
              <li><a href="{{ url('/admin-home') }}">Home</a></li>
              <li><a href="{{ url('/admin-consoles') }}">Consoles</a></li>
              <li><a href="{{ url('/admin-genres') }}">Genres</a></li>
              <li><a href="{{ url('/admin-ontwikkelaars') }}">Ontwikkelaars</a></li>
              <li><a href="{{ url('/admin-artikels') }}">Artikels</a></li>
              <li><a href="{{ url('/admin-bestellingen') }}">Bestellingen</a></li>
            </ul>
          </div>

          <div class="gebruiker pull-right">
            @if (Auth::user())
              <p>U bent ingelogd als {{Auth::user()->voornaam}} {{Auth::user()->familienaam}} ({{Auth::user()->type}}) (<a href="{{ url('/admin-logout') }}">Uitloggen</a>)</p>  
            @endif      

            @if (!Auth::user())
              <p>U bent niet ingelogd. Gelieve u <a href="{{ url('/admin-login') }}">in te loggen</a>.</p>  
            @endif         
          </div>
        </div>
  </header>

  <div class="content">
      @yield('content')
  </div>


<footer class=" col-md-12">
    <div class="row col-md-12 naam">
          <p>2015 -- gameaction</p>
    </div>
</footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://eindwerk.local/webshop/public/js/bootstrap.min.js"></script>

    @yield('script')
  </body>
</html>