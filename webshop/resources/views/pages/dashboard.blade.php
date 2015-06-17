@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Dashboard</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Dashboard</h2>
      </div>

                  <div class="col-md-12 row">
    @include('flash::message')
      </div>

      <div class="row col-md-7 mijn_gegevens">
        <h2>Mijn gegevens</h2>
        <div class="col-md-3 row">
          <p>Naam:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{Auth::user()->voornaam}} {{Auth::user()->familienaam}}</p>
        </div>

        <div class="col-md-3 row">
          <p>Adres:</p>
        </div>

        <div class="col-md-9 row">
        @if ((empty(Auth::user()->adres))||(empty(Auth::user()->postcode))||(empty(Auth::user()->land)))
        	<p>Geen adres opgegeven</p>
        @else
          <p>{{Auth::user()->adres}} @if(!empty(Auth::user()->bus))-- {{Auth::user()->bus}}</p>@endif
          <p>{{Auth::user()->postcode}} {{Auth::user()->gemeente}}</p>
          <p>{{Auth::user()->land}}</p>
         @endif
        </div>

        <div class="col-md-3 row">
          <p>Telefoon:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{Auth::user()->telefoon}}</p>
        </div>

        <div class="col-md-3 row">
          <p>E-mailadres:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{Auth::user()->email}}</p>
        </div>
      </div>

      <div class="row col-md-5 mijn_bestellingen">
        <h2>Mijn bestellingen</h2>
        <table>
          <tr>
            <th>Ordernummer:</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>
          <tr>
            <td>01122465</td>
            <td>04/03/2015</td>    
            <td>€ 29,99</td>
            <td>Bezorgd</td>
          </tr>
          <tr>
            <td>01122432</td>
            <td>13/03/2015</td>    
            <td>€ 33,99</td>
            <td>Onderweg</td>
          </tr>
          <tr>
            <td>01122433</td>
            <td>09/04/2015</td>    
            <td>€ 29,99</td>
            <td>niet betaald</td>
          </tr>
        </table>
        <p class="mijn_bestellingen_link"><a href="bestellingen.html">Bekijk alle bestellingen</a></p>
      </div>

      <div class="row col-md-12 gegevens_wijzigen">
        <a href="{{ url('/dashboard/edit', Auth::user()->id) }}">Mijn gegevens wijzigen</a>
      </div>

      @if (isset($wijzigen))

      <div class="row col-md-12 gegevens_wijzigen">
      <h2>Mijn gegevens wijzigen</h2>

      @if ($errors->any())
  <div class="row col-md-12">
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
        {!!  Form::model(Auth::user(), ['action' => ['PagesController@dashboard_wijzigen_confirmed', Auth::user()->id], 'class' => 'registreren', 'name' =>'artikel_wijzigen']) !!}
        <div class="row kolom1 col-md-6">
          <div class="veld_register col-md-12 row">
            <div class="col-md-6 row">
              <label for="familienaam">Naam*:</label>
                <input type="text" name="familienaam" id="familienaam" value="{{Auth::user()->familienaam}}">
            </div>

            <div class="col-md-6 row">
              <label for="voornaam">Voornaam*:</label>
                <input type="text" name="voornaam" id="voornaam" value="{{Auth::user()->voornaam}}">
            </div>
          </div>

           <label for="email">E-mailadres*:</label>
            <input type="text" name="email" id="email" value="{{Auth::user()->email}}"> 

           <label for="telefoon">Telefoon:</label>
            <input type="text" name="telefoon" id="telefoon" value="{{Auth::user()->telefoon}}">    
        </div>

        <div class="row kolom2 col-md-6">
          <div class="veld_register col-md-12 row">
            <div class="col-md-8 row">
              <label for="adres">Straat + nr:</label>
                <input type="text" name="adres" id="adres" value="{{Auth::user()->adres}}">
            </div>

            <div class="col-md-4 row">
              <label for="bus">Bus:</label>
                <input type="text" name="bus" id="bus" value="{{Auth::user()->bus}}">
            </div>
          </div>

          <div class="veld_register col-md-12 row">
            <div class="col-md-4 row">
              <label for="postcode">Postcode:</label>
              <input type="text" name="postcode" id="postcode" value="{{Auth::user()->postcode}}">
            </div>

            <div class="col-md-8 row">
              <label for="gemeente">Gemeente:</label>
              <input type="text" name="gemeente" id="gemeente" value="{{Auth::user()->gemeente}}">
            </div>
          </div>

          <label for="land">Land:</label>
            <input type="text" name="land" id="land" value="{{Auth::user()->land}}">

          
        </div>

        <div class="row onder col-md-12">
          <p>Velden met een * zijn verplicht.</p>
          <input type="submit" value="wijzigen" name="wijzigen" id="wijzigen">
        </div>
      </form></div>
      @endif
@stop