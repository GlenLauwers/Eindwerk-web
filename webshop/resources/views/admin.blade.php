<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="" />
    <title>{{ $title }}</title>

    <!-- Style -->
    <link href="http://eindwerk.local/webshop/public/css/bootstrap.min.css " rel="stylesheet">
    <link href="http://eindwerk.local/webshop/public/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>

  <header>
      <div id="hoofding" class="hoofding row col-md-12 centered">
        <div class="logo col-md-4">
          <a href="index.html"><img src="http://eindwerk.local/webshop/public/afbeeldingen/logo.png" alt="logo"></a>
        </div>
      </div>
  </header>

  <div class="content">
    @yield('content')
  </div>

   <footer class="row col-md-12 naam">
          <p>2015 -- gameaction</p>
    </footer>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="http://eindwerk.local/webshop/public/js/bootstrap.min.js"></script>

    @yield('script')
  </body>
</html>