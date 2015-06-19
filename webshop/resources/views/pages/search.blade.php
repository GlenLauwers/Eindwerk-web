@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Zoeken</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>@if(isset($input))@if($functie == true)"{{ $input }}"@endif @endif zoeken</h2>
      </div>

            <div class="col-md-12 row">
    @include('flash::message')
      </div>

      <div class="row col-md-12">

        <div class=" col-md-10 overzicht">
        @if(!count($artikels))
          <p class="error">Er werden geen games gevonden.</p>
        @endif
        @foreach ($artikels as $artikel)
          <div class="product_home col-md-4">
            <a href="{{ url('games') }}/{{ $artikel->id_artikels }}"><img src="{{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover" alt="Assassin's Creed: Unity">
              <p>{{$artikel->naam}}</p></a>

              <div class="col-md-12 overzicht_info">
                  <p class="overzicht_prijs">€ {{$artikel->prijs}}</p>
              </div>
          </div>
          @endforeach

          {!! str_replace('/?', '?', $artikels->render()) !!}
        </div>
      </div>
@stop