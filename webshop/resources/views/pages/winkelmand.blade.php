@extends('app')

@section('content')
 <div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Mijn winkelmand</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Mijn winkelmand</h2>
      </div> 

      <div class="col-md-12 row">
    @include('flash::message')
      </div>
      @if (!count($winkelmand))
        <p class="col-md-12 row">Er werden geen artikels aan uw winkelmand toegevoegd.</p>
      @else  
      @foreach ($winkelmand as $winkelmand)
      {!!  Form::open(array('action' => ['PagesController@update_winkelmand', $winkelmand->artikel_id], 'class' => 'registreren', 'name' =>'Registreren')) !!}
      <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          <img src="{{asset('/afbeeldingen')}}/{{ $winkelmand->cover }}" alt="{{ $winkelmand->naam }}">
        </div>

        <div class="row col-md-5 aantal">
          <label for="aantal">Aantal:</label>  
            <input type="text" value="{{ $winkelmand->aantal_in_winkelmand }}" name="aantal">  
          <a href="{{ url('/winkelmand/delete', $winkelmand->id_winkelmand) }}">Verwijderen</a>

          <p>{{ $winkelmand->naam }}</p>
          <p>Console: {{ $winkelmand->console }}</p>      
        </div>
        <div class="col-md-3 bedrag">
          <p>€ {{ $winkelmand->prijs * $winkelmand->aantal_in_winkelmand }}</p>
          <input type="hidden" name="id" value="{{ $winkelmand->id_winkelmand }}">
        </div><input type="submit" name="aantal_wijzigen" id="aantal_wijzigen" value="Winkelmand wijzigen">
      </div>
  {!!  Form::close() !!}
       
      @endforeach 

    
<div class="row col-md-5 cover">
          
        </div>
        <div class="row col-md-8 totaalbedrag">
        <div class="row col-md-5 cover">
          
        </div>
        <div class="row col-md-5 aantal">
          <p>Verzendingskosten</p>  
        </div>

        <div class="row col-md-2 bedrag">
          <p>Gratis</p>
        </div>
      </div>
      </div>

      <div class="row col-md-8 totaalbedrag">
        <div class="row col-md-5 cover">
          
        </div>

        <div class="row col-md-5 aantal">
          <p>Totaalbedrag</p>
          <p>Inclusief BTW, bebat en recupel</p> 
        </div>

        <div class="row col-md-2 bedrag">
          <p>€ {{ $totaal }}</p>
        </div>
      </div>

      <div class="col-md-12">
        <a href="{{ url('/afrekenen') }}">Afrekenen</a>
      </div>
      @endif

@stop