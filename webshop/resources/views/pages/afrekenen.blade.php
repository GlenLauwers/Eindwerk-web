@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="index.html">Home</a>><a href="winkelmand.html">Winkelmand</a>>Afrekenen</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Afrekenen</h2>
      </div>
<div class="product_afrekenen row col-md-12">
            <h2>Producten</h2>
          @foreach ($winkelmand as $winkelmand)
       <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          <img src="{{asset('/afbeeldingen')}}/{{ $winkelmand->cover }}" alt="{{ $winkelmand->naam }}">
        </div>

        <div class="row col-md-5 aantal">
          <p>Aantal: {{ $winkelmand->aantal_in_winkelmand }}</p>

           <p>{{ $winkelmand->naam }}</p>
          <p>Console: {{ $winkelmand->console }}</p>      
        </div>

        <div class="col-md-3 bedrag">
          <p>€ {{ $winkelmand->prijs * $winkelmand->aantal_in_winkelmand }}</p>
        </div>
      </div>

      @endforeach

      <div class="row col-md-8 totaalbedrag">
        <div class="row col-md-5 cover">
          
        </div>

        <div class="row col-md-5 aantal">
          <p>Totaalbedrag</p>
          <p>Inclusief BTW, bebat en recupel</p> 
        </div>

        <div class="col-md-3 bedrag">
          <p>€ {{ $totaal }}</p>
        </div>
      </div></div>
      <div class="row col-md-12">

        {!!  Form::open(array('url' => 'afrekenen', 'class' => 'registreren', 'name' =>'Afrekenen')) !!}
          <h2>Mijn verzendgegevens</h2>
          <div class="row kolom1 col-md-6">
          <div class="veld_register col-md-12 row">
            <div class="col-md-6 row">
              <label for="familienaam">Naam:</label>
                <input type="text" name="familienaam" id="familienaam" value="{{ $user[0]['familienaam'] }}">
            </div>

            <div class="col-md-6 row">
              <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" value="{{ $user[0]['voornaam'] }}">
            </div>
          </div>

          <label for="mail">E-mailadres:</label>
            <input type="text" name="mail" id="mail" value="{{ $user[0]['email'] }}">

          <div class="veld_register col-md-12 row">
            <div class="col-md-8 row">
              <label for="adres">Straat + nr:</label>
                <input type="text" name="adres" id="adres" value="{{ $user[0]['adres'] }}">
            </div>

            <div class="col-md-4 row">
              <label for="bus">Bus:</label>
                <input type="text" name="bus" id="bus" value="{{ $user[0]['bus'] }}">
            </div>
          </div>
        </div>

        <div class="row kolom2 col-md-6">          
          <div class="veld_register col-md-12 row">
            <div class="col-md-4 row">
              <label for="postcode">Postcode:</label>
              <input type="text" name="postcode" id="postcode" value="{{ $user[0]['postcode'] }}">
            </div>

            <div class="col-md-8 row">
              <label for="gemeente">Gemeente:</label>
              <input type="text" name="gemeente" id="gemeente" value="{{ $user[0]['gemeente'] }}">
            </div>
          </div>

          <label for="land">Land*:</label>
            <input type="text" name="land" id="land" value="{{ $user[0]['land'] }}">

          <label for="telefoon">Telefoon:</label>
            <input type="text" name="telefoon" id="telefoon" value="{{ $user[0]['telefoon'] }}">
        </div>

        
        <div class="col-md-12 row">
        <p>Als u op 'Bestellen' klikt ontvangt u een mailt met het overzicht van uw bestelling en de factuur.</p>
        <input type="submit" value="Bestellen" name="betalen" id="betalen">
        </div></div>
         {!!  Form::close() !!}
      </div>
@stop