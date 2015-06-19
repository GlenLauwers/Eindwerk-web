@extends('app')

@section('content')

<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Registreren</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Registreren</h2>
        <p>Vul het onderstaande formulier in om u te registreren.</p>
      </div>

      <div class="col-md-12 row">
    @include('flash::message')
      </div>

      @if ($errors->any())
  <div class="row col-md-12">
    <ul class="alert alert-danger">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

     {!!  Form::open(array('url' => 'register', 'class' => 'registreren', 'name' =>'Registreren')) !!}
        <div class="row kolom1 col-md-6">
          <div class="veld_register col-md-12 row">
            <div class="col-md-6 row">
              <label for="familienaam">Naam*:</label>
                <input type="text" name="familienaam" id="familienaam" value="{{ old('familienaam') }}">
            </div>

            <div class="col-md-6 row">
              <label for="voornaam">Voornaam*:</label>
                <input type="text" name="voornaam" id="voornaam" value="{{ old('voornaam') }}">
            </div>
          </div>
          
          <label for="email">E-mailadres*:</label>
            <input type="text" name="email" id="mail" value="{{ old('email') }}">
          
          <label for="wachtwoord">Wachtwoord*:</label>
            <input type="password" name="wachtwoord" id="wachtwoord">

          <label for="wachtwoord_confirmation">Wachtwoord bevestigen*:</label>
            <input type="password" name="wachtwoord_confirmation" id="_confirmation">         
        </div>

        <div class="row kolom2 col-md-6">
                   <div class="veld_register col-md-12 row">
            <div class="col-md-8 row">
              <label for="adres">Straat + nr:</label>
                <input type="text" name="adres" id="adres" value="{{ old('adres') }}">
            </div>

            <div class="col-md-4 row">
              <label for="bus">Bus:</label>
                <input type="text" name="bus" id="bus" value="{{ old('bus') }}">
            </div>
          </div>

          <div class="veld_register col-md-12 row">
            <div class="col-md-4 row">
              <label for="postcode">Postcode:</label>
              <input type="text" name="postcode" id="postcode" value="{{ old('postcode') }}">
            </div>

            <div class="col-md-8 row">
              <label for="gemeente">Gemeente:</label>
              <input type="text" name="gemeente" id="gemeente" value="{{ old('gemeente') }}">
            </div>
          </div>

          <label for="land">Land:</label>
            <input type="text" name="land" id="land" value="{{ old('land') }}">

          <label for="telefoon">Telefoon:</label>
            <input type="text" name="telefoon" id="telefoon" value="{{ old('telefoon') }}">
        </div>

        <div class="row onder col-md-12">
          <input type="checkbox" value="1" name="voorwaarden" id="voorwaarden"><label>Ja, ik ga akkoord met de <a href="{{ asset('/voorwaarden') }}">voorwaarden</a></label>
          <p>Velden met een * zijn verplicht.</p>
          <input type="submit" value="Registreren" name="registreren" id="registreren">
        </div>
     {!!  Form::close() !!}
@stop