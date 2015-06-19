@extends('app')

@section('content')
  <div class="row col-md-12 carousel_wrapper">
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
  
      <div class="carousel-inner" role="listbox">
        <div class="item active">
          <img src="{{asset('/afbeeldingen/home/gta5.jpg')}}" alt="GTA 5">
        </div>
  
        <div class="item">
          <img src="{{asset('/afbeeldingen/home/watch_dogs.jpg')}}" alt="Watch Dogs">
        </div>
        
        <div class="item">
          <img src="{{asset('/afbeeldingen/home/the_last_of_us.jpg')}}" alt="The Last Of Us">
        </div>
      </div>
  
      <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev"></a>
      <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next"></a>
    </div>
  </div>

  <div class="row col-md-12 overzicht">
    <h2>Nieuw in ons assortiment</h2>
      @foreach ($nieuw as $artikel)
        <div class="col-md-3">
          <a href="games/{{ $artikel->id_artikels }}">
            <img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover_home">
            <p>{{ $artikel->naam }}</p>
            <p>{{ $artikel->release_datum }}</p></a>
        </div>
      @endforeach
  </div>

  <div class="row col-md-12 overzicht">
    <h2>Te verwachten</h2>
      @foreach ($te_verwachten as $artikel)
        <div class="col-md-3">
          <a href="games/{{ $artikel->id_artikels }}">
          <img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover_home">
          <p>{{ $artikel->naam }}</p>
          <p>{{ $artikel->release_datum }}</p></a>
        </div>
      @endforeach
  </div>
@stop