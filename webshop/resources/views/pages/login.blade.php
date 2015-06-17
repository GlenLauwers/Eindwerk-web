@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Inloggen</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Inloggen</h2>
      </div>

      <div class="col-md-12 row">
    @include('flash::message')
      </div>

      <div class="bestaande_klanten col-md-8 row">
        {!!  Form::open(array('url' => 'login', 'class' => 'login', 'name' =>'login')) !!}
          <h3>Bestaande klanten</h3>
          <label for="mail">E-mailadres:</label>
            <input type="text" name="mail" id="mail">

          <label for="wachtwoord">Wachtwoord:</label>
            <input type="password" name="wachtwoord" id="wachtwoord">

          <input type="submit" name="inloggen" value="Inloggen" id="inloggen">
         {!!  Form::close() !!}
      </div>

      <div class="nieuw col-md-4 row">
        <h3>Ben je nieuw hier?</h3>
        <p><a href="{{ url('/register') }}">Ga verder om je te registreren</a></p>
      </div>
@stop