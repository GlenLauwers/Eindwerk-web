<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="Keywords" content="" />
    <title><?= $titel ?></title>

    <!-- Style -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header>
      <div id="hoofding" class="hoofding row col-md-12 centered">
        <div class="logo col-md-4">
          <a href="admin"><img src="afbeeldingen/logo.png" alt="logo"></a>
        </div>

        <div class="links">
          <div class="pull-right">
            <ul>
              <li><a href="admin">Home</a></li>
              <li><a href="admin-console">Consoles</a></li>
              <li><a href="admin-genres">Genres</a></li>
              <li><a href="admin-ontwikkelaars">Ontwikkelaars</a></li>
              <li><a href="">Artikels</a></li>
              <li><a href="">Bestellingen</a></li>
            </ul>
          </div>

          <div class="gebruiker pull-right">
              <p>U bent ingelogd als Glen Lauwers (<a href="#">Uitloggen</a>)</p>
          </div>
        </div>
      </div>
      <hr>
    </header>

    <div class="content">