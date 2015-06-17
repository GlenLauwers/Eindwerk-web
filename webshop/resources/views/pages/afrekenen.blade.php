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
          
       <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          <img src="afbeeldingen/assassin.jpg">
        </div>

        <div class="row col-md-5 aantal">
          <p>Aantal: 1</p>

          <p>Assassin's Creed: Unity</p>
          <p>Console: PS4</p>      
        </div>

        <div class="col-md-3 bedrag">
          <p>€ 69,98</p>
        </div>
      </div>

      <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          <img src="afbeeldingen/assassin.jpg">
        </div>

        <div class="row col-md-5 aantal">
          <p>Aantal: 1</p>

          <p>Assassin's Creed: Unity</p>
          <p>Console: PS4</p>      
        </div>

        <div class="col-md-3 bedrag">
          <p>€ 69,98</p>
        </div>
      </div>

      <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          
        </div>

        <div class="row col-md-5 aantal">
          <p>Verzendingskosten</p>  
        </div>

        <div class="col-md-3 bedrag">
          <p>Gratis</p>
        </div>
      </div>

      <div class="row col-md-8 totaalbedrag">
        <div class="row col-md-5 cover">
          
        </div>

        <div class="row col-md-5 aantal">
          <p>Totaalbedrag</p>
          <p>Inclusief BTW, bebat en recupel</p> 
        </div>

        <div class="col-md-3 bedrag">
          <p>€ 84,97</p>
        </div>
      </div></div>
      <div class="row col-md-12">

        <form class="betalen" method="POST">
          <h2>Mijn gegevens</h2>
          <div class="row kolom1 col-md-6">
          <div class="veld_register col-md-12 row">
            <div class="col-md-6 row">
              <label for="familienaam">Naam:</label>
                <input type="text" name="familienaam" id="familienaam" value="Lauwers">
            </div>

            <div class="col-md-6 row">
              <label for="voornaam">Voornaam:</label>
                <input type="text" name="voornaam" id="voornaam" value="Glen">
            </div>
          </div>

          <label for="mail">E-mailadres:</label>
            <input type="text" name="mail" id="mail" value="glenlauwers@hotmail.com">

          <div class="veld_register col-md-12 row">
            <div class="col-md-8 row">
              <label for="adres">Straat + nr:</label>
                <input type="text" name="adres" id="adres" value="Stuikberg 30">
            </div>

            <div class="col-md-4 row">
              <label for="bus">Bus:</label>
                <input type="text" name="bus" id="bus">
            </div>
          </div>
        </div>

        <div class="row kolom2 col-md-6">          
          <div class="veld_register col-md-12 row">
            <div class="col-md-4 row">
              <label for="postcode">Postcode:</label>
              <input type="text" name="postcode" id="postcode" value="1840">
            </div>

            <div class="col-md-8 row">
              <label for="gemeente">Gemeente:</label>
              <input type="text" name="gemeente" id="gemeente" value="Londerzeel">
            </div>
          </div>

          <label for="land">Land*:</label>
            <input type="text" name="land" id="land" value="België">

          <label for="telefoon">Telefoon:</label>
            <input type="text" name="telefoon" id="telefoon" value="0478739686">
        </div>

        <div class="row onder betalingswijze_afrekenen col-md-12">
        <h2>Betalingswijze</h2>
         
            <input type="radio" value="creditcard" name="betalingswijze"> <label>Creditcard</label><br>
          
            <input type="radio" value="banckcontact" name="betalingswijze"><label>Banckcontact</label><br>
          
            <input type="radio" value="paypal" name="betalingswijze"><label>Paypal</label><br></div>

          
          
        </div>
        
        <div class="col-md-12 row">
        <input type="submit" value="Betalen" name="betalen" id="betalen">
        </div></div>
        </form>
      </div>
@stop