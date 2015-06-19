@extends('app')

@section('content')
      <div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>{{ $consoles->console }} games</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>{{ $consoles->console }} Games</h2>
      </div>

       <div class="col-md-12 row">
    @include('flash::message')
      </div>
      <div class="row col-md-12">
        <div class="row col-md-2 genre">
          <h4>Genre:</h4>
          <ul> 
           <li><a href="{{ url('console')}}/{{$consoles->id_consoles}}">Alle genres</a></li>
            @foreach ($genre as $genre)
           
            <li><a href="{{ url('console')}}/{{$consoles->id_consoles}}?genre={{ $genre->id_genres }}">{{ $genre->genres }}</a></li>
           @endforeach
          </ul>
         
        </div>

        <div class=" col-md-10 overzicht">
        @if(!count($artikels))
          <p class="error">Er werden geen games gevonden.</p>
        @endif
        @foreach ($artikels as $artikel)
          <div class="product_home col-md-4">
            <a href="{{ url('games') }}/{{ $artikel->id_artikels }}"><img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover" alt="Assassin's Creed: Unity">
              <p>{{$artikel->naam}}</p></a>

              <div class="col-md-12 overzicht_info">
                <div class="col-md-8">
                  <p class="overzicht_prijs">€ {{$artikel->prijs}}</p>
                </div>

                <div class="col-md-4" id="overzicht_winkelkar">
                  @if($artikel->aantal < 1)
                    <img src="{{ asset('afbeeldingen/niet_beschikbaar.png') }}">
                  @else
                  <a href="{{ url('winkelmand') }}/{{$artikel->id_artikels}}"><img src="{{ asset('afbeeldingen/winkelkar.png') }}"></a>
                  @endif
                </div>
              </div>
          </div>
          @endforeach

          {!! str_replace('/?', '?', $artikels->render()) !!}
        </div>
      </div>
@stop