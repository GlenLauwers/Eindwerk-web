@extends('app')

@section('content')
 <div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>>Contact</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Contact</h2>
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

      <div class="row col-md-12">
        {!!  Form::open(array('url' => 'contact', 'class' => 'registreren', 'name' =>'contact')) !!}
        <div class="row col-md-6">
          <label for="familienaam">Naam*:</label>
            <input type="text" name="familienaam" id="familienaam" value="@if (Auth::user()){{$auth->familienaam }}@endif">

          <label for="voornaam">Voornaam*:</label>
            <input type="text" name="voornaam" id="voornaam" value="@if (Auth::user()){{$auth->voornaam }}@endif">

          <label for="email">E-mailadres*:</label>
            <input type="text" name="email" id="email" value="@if (Auth::user()){{$auth->email }}@endif">
        </div>

        <div class="col-md-6 row">
          <label for="bericht">Bericht*:</label>
            <textarea name="bericht" id="bericht" rows="8"></textarea>
        </div>

        <div class="col-md-12 row">
          <input type="checkbox" name="voorwaarde" id="voorwaarde"> <label>Ik ga akkoord met de <a href="{{ asset('/voorwaarden') }}">voorwaarden</a>.</label><br>
          <p>Velden met een * zijn verplicht.</p>
          <input type="submit" name="verzenden" id="verzenden" value="Verzenden">
        </div>

        {!!  Form::close() !!}
      </div>
</div>
@stop