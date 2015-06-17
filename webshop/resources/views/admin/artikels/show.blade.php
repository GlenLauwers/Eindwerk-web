@extends('admin')

@section('content')


<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-artikels') }}">Artikels</a>>{{ $Artikels[0]['naam'] }}</p>
    
    <h1>{{ $Artikels[0]['naam'] }}</h1>
    <p><a href="{{ asset('/admin-artikels') }}/edit/{{ $Artikels[0]['id_artikels'] }}">Wijzigen</a></p>
</div>
   <div class="row col-md-12 game">
        <div class="foto row col-md-3">
          <img src="{{asset('/afbeeldingen')}}/{{ $Artikels[0]['cover'] }}" alt="Heavy Rain"> 
        </div>

        <div class="col-md-9 row prijs">
          <div class="col-md-12 boven">
          <div class="col-md-3">
          <h4>€ {{ $Artikels[0]['prijs'] }}</h4>
          @if ( $Artikels[0]['aantal']> 0)
            <p class="voorraad">Op voorraad</p></div>
          @else
            <p class="voorraad niet_verkrijgbaar">Niet meer verkrijgbaar</p>
          @endif
		</div>

          <div class="col-md-12 info">
            <p>Aantal: {{ $Artikels[0]['aantal'] }}</p>
            <p>Genre: {{ $Artikels[0]['genres'] }}</p>
            <p>Console: {{ $Artikels[0]['console'] }}</p>
            <p>Datum Release: {{ $Artikels[0]['release_datum'] }}</p>
            <p>Ontwikkelaar: {{ $Artikels[0]['ontwikkelaars'] }}</p>
            <p>Beschikbaar voor:  @foreach ( $beschikbaar_op as $beschikbaar_op ) <a href="{{ $beschikbaar_op->id_artikels }}">{{ $beschikbaar_op->console }}</a>@endforeach </p>

          </div>
        </div>
      </div>

      <div class="col-md-12 row beschrijving">
        <h3>Beschrijving</h3>
        <p><?= nl2br ($Artikels[0]['beschrijving'] )?></p>
	</div>

      <div class="col-md-12 row screenshots">
        <h3>Screenshots</h3>
          @if (!count($screenshots))
            <p>Er werden geen screenshots gevonden.</p>

          @else
            @foreach ($screenshots as $screenshot)
              <img src="{{asset('/afbeeldingen')}}/{{ $screenshot->screenshot }}" class="screenshots_img">
            @endforeach
          @endif
          <p><a href="{{ url('/admin-artikels/screenshots', $Artikels[0]['id_artikels']) }}">Screenshots beheren</a></p>
      </div>

      <div class="row center-block col-md-12 trailer">
        <h3>Trailer</h3>
        <iframe class="center-block" src="{{ $Artikels[0]['trailer'] }}" allowfullscreen width="420" height="315"></iframe>
      </div>
</div>
@stop