@extends('app')

@section('content')
 <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <div class="carousel-inner" role="listbox">
          <div class="item active">
            <img src="afbeeldingen/home/gta5.jpg" alt="GTA 5">
          </div>

          <div class="item">
            <img src="afbeeldingen/home/watch_dogs.jpg" alt="Watch Dogs">
          </div>
      
          <div class="item">
            <img src="afbeeldingen/home/the_last_of_us.jpg" alt="The Last Of Us">
          </div>
        </div>

        <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
        </a>
        <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
        </a>
      </div>

      <div class="row col-md-12 nieuw">
        <h2>Nieuw in ons assortiment</h2>

        <div class=" col-md-12 overzicht">
          @foreach ($nieuw as $artikel)
       
          <div class="product_home col-md-2 row">
            <a href="games/{{ $artikel->id_artikels }}">
            <img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover">
            <p>{{ $artikel->naam }}</p>
            <p>{{ $artikel->release_datum }}</p></a></div>

          @endforeach
        </div>

      <div>
        <h2>Te verwachten</h2>

         <div class=" col-md-12 overzicht">
          @foreach ($te_verwachten as $artikel)
       
          <div class="product_home col-md-2 row">
            <a href="games/{{ $artikel->id_artikels }}">
            <img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover">
            <p>{{ $artikel->naam }}</p>
            <p>{{ $artikel->release_datum }}</p></a></div>

          @endforeach
        </div>
      </div>
    </div>
@stop