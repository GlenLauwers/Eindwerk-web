@extends('app')

@section('content')
<div class="row col-md-12 titel">
    <p><a href="{{ asset('/home') }}">Home</a>><a href="{{ asset('/console') }}/{{ $artikels[0]['console_id'] }}">{{ $artikels[0]['console'] }} games</a>>{{ $artikels[0]['naam'] }}</p>
    
    <h1>{{ $artikels[0]['naam'] }}</h1>

     <div class="col-md-12 row">
    @include('flash::message')
      </div>
</div>
   <div class="row col-md-12 game">
        <div class="foto row col-md-3">
          <img src="{{asset('/afbeeldingen')}}/{{ $artikels[0]['cover'] }}" alt="Heavy Rain"> 
        </div>

        <div class="col-md-9 row prijs">
          <div class="col-md-12 boven">
          <div class="col-md-4">
          <h4>€ {{ $artikels[0]['prijs'] }}</h4>
          @if ( $artikels[0]['aantal']> 0)
            <p class="voorraad">Op voorraad</p></div>
          @else
            <p class="voorraad niet_verkrijgbaar">Niet verkrijgbaar</p>
          @endif

          <div class="knoppen col-md-3">
           @if($artikels[0]['aantal'] < 1)
                    <img src="{{ asset('afbeeldingen/niet_beschikbaar.png') }}">
                  @else
                  <a href="{{ url('winkelmand') }}/{{$artikels[0]['id_artikels']}}"><img src="{{ asset('afbeeldingen/winkelkar.png') }}"></a>
                  @endif
            
          </div>
    </div>

          <div class="col-md-12 info">
            <p>Genre: {{ $artikels[0]['genres'] }}</p>
            <p>Console: {{ $artikels[0]['console'] }}</p>
            <p>Datum Release: {{ $artikels[0]['release_datum'] }}</p>
            <p>Ontwikkelaar: {{ $artikels[0]['ontwikkelaars'] }}</p>
            <p>Beschikbaar voor:  @foreach ( $beschikbaar_op as $beschikbaar_op ) <a href="{{ $beschikbaar_op->id_artikels }}">{{ $beschikbaar_op->console }}</a>@endforeach </p>

          </div>
        </div>
      </div>

      <div class="col-md-12 row beschrijving">
        <h3>Beschrijving</h3>
        <p><?= nl2br ($artikels[0]['beschrijving'] )?></p>
  </div>

      <div class="col-md-12 row screenshots">
        <h3>Screenshots</h3>
          @if (!count($screenshots))
            <p>Er werden geen screenshots gevonden.</p>

          @else
            @foreach ($screenshots as $screenshot)
              <a href="{{asset('/afbeeldingen')}}/{{ $screenshot->screenshot }}" data-lightbox="screenshots" data-title="{{ $artikels[0]['naam'] }}-{{ $artikels[0]['console'] }}">
              <img src="{{asset('/afbeeldingen')}}/{{ $screenshot->screenshot }}" class="screenshots_img" alt="{{ $artikels[0]['naam'] }}-{{ $artikels[0]['console'] }}"></a>
            @endforeach
          @endif
      </div>

      <div class="row center-block col-md-12 trailer">
        <h3>Trailer</h3>
        <iframe class="center-block" src="{{ $artikels[0]['trailer'] }}" allowfullscreen width="420" height="315"></iframe>
      </div>
      <div class="col-md-12 row reviews">
        <h3>Reviews</h3>
        @if (!count($review))
    <div class="col-md-12 row">
        <p>Er werden nog geen reviews geplaatst.</p>
    </div>
@endif

@if (count($review))
        <div class="row col-md-12 beschrijving">
          @foreach ($review as $review)
            <p><b>{{ $review->voornaam }} {{ $review->familienaam }}</b></p>
            <p><i>Geplaatst op {{ $review->datum }}</i></p>
            <p>{{ $review->review }}</p>
            @if(Auth::user())
            @if($review->users_id = Auth::user()->id)
              <p><a href="{{ url('/games/review/delete', $review->id_reviews) }}">Verwijderen</a></p>
            @endif @endif
          @endforeach
        
        </div>@endif
         <h4>Review plaatsen</h4>
         @if (Auth::user())
           {!!  Form::open(array('action' => ['PagesController@review', $artikels[0]['id_artikels']], 'class' => 'registreren', 'name' =>'Registreren')) !!}
           <input type="hidden" name="id" value="{{Auth::user()->id}}">
            <textarea class="review" name="review" id="review" cols="12" rows="4"></textarea>
            <input type="submit" name="toevoegen" value="Review Plaatsen">
           {!!  Form::close() !!}

          @else
          <p><a href="{{ url('/login') }}">Log in</a> om een review te plaatsen.</p>
        @endif
      </div></div>

   
@stop
