<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="" />
    <title>{{ $title }}</title>

    <!-- Style -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/lightbox.css')}}" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <body>
    <header>
    <div>
      <div id="hoofding" class="hoofding row col-md-12">
        <div class="content">
          <div class="logo col-md-4">
            <a href="{{ url('/home') }}"><img src="{{ asset('/afbeeldingen/logo.png') }}" alt="logo"></a>
          </div>

          <div class="linken col-md-8 hidden-sm hidden-xs">
            <div class="pull-right">
              <div>
                <ul>
                  <li><a href="{{ url('/home') }}">Home</a></li>
                  <li><a href="{{ url('/winkelmand') }}">Winkelmand</a></li>
                  <li><a href="{{ url('/over-ons') }}">Over ons</a></li>
                  <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul> 
              </div>
  
              <div class="gebruiker pull-right">
                @if (Auth::user())
                  <p>U bent ingelogd als <a href="{{ url('/dashboard') }}">{{Auth::user()->voornaam}} {{Auth::user()->familienaam}}</a> (<a href="{{ url('/logout') }}">Uitloggen</a>)</p>  
                @endif      

                @if (!Auth::user())
                  <p>U bent nog niet ingelogd (<a href="{{ url('/login') }}">Inloggen</a>)</p>  
                @endif             
              </div>

              <div class="row col-md-12 zoeken pull-right">
                {!!  Form::open(array('url' => 'search', 'class'=>'pull-right', 'name' =>'zoeken')) !!}
                  <input type="text" name="zoeken" placeholder="Zoek uw game">
                {!!  Form::close() !!}
              </div>
            </div>
          </div>
        </div>
      </div>

      <nav class="col-md-12 navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          </div>
        </div>

        <div id="navbar" class="navbar-collapse collapse nav">
          @foreach ($console as $console)
          <ul class="nav navbar-nav navigatie  ">
            <li><a href="{{ url('console')}}/{{ $console->id_consoles }}">{{ $console->console }}</a></li>
          </ul>
          @endforeach
        </div>
      </nav>
    </div>
    </header>

    <div class="content">
		@yield('content')
    </div>
	
    <footer class="col-md-12">
      <div class="row col-md-12 footer ">
        <div class="row col-md-4 service">
          <h2>Klantenservice</h2>
          <ul>
            <li><a href="{{ url('/home') }}">Home</a></li>
            <li><a href="{{ url('/login') }}">Inloggen</a></li>
            <li><a href="{{ url('/over-ons') }}">Over ons</a></li>
            <li><a href="{{ url('/contact') }}">Contact</a></li>
          </ul>
        </div>

        <div class="row col-md-4 betalingswijze">
          <p>Betalen via overschrijving</p>
          <p>Gratis Verzending</p>
        </div>

        <div class="col-md-4 row logo_foot pull-right">
          <img src="{{ asset('/afbeeldingen/logo_wit.png ') }}" alt="logo">
        </div>   
      </div>
    
      <div class="row col-md-12 naam">
        <p>2015 -- gameaction</p>
      </div>
      
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="{{ asset('/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{ asset('/js/lightbox.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('/js/jquery-1.11.2.min.js')}}"></script>
    
  </body>