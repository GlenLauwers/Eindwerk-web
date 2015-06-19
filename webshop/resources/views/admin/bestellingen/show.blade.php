@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>><a href="{{ asset('/admin-bestellingen') }}">Bestellingen</a>>Factuurnummer {{ $id }}</p>
    <h1>Admin: Factuurnummer {{ $id }}</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>
        @if (!count($bestelling))
        <p class="col-md-12 row">U hebt geen bestelling met dit nummer.</p>

        @else
          <h2>Producten</h2>
          @foreach ($details as $winkelmand)
       <div class="row col-md-8 spel">
        <div class="row col-md-5 cover">
          <img src="{{asset('/afbeeldingen')}}/{{ $winkelmand->cover }}" alt="{{ $winkelmand->naam }}">
        </div>

        <div class="row col-md-5 aantal">
          <p>Aantal: {{ $winkelmand->aantal_in_details }}</p>

           <p>{{ $winkelmand->naam }}</p>
          <p>Console: {{ $winkelmand->console }}</p>      
        </div>

        <div class="col-md-3 bedrag">
          <p>€ {{ $winkelmand->prijs * $winkelmand->aantal_in_details }}</p>
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
          <p>€ {{ $bestelling[0]['prijs'] }}</p>
        </div>

        <div class="row col-md-12">
         <h2>Status</h2>
         <p>De bestelling werd geplaatst op: {{ $bestelling[0]['datum'] }}</p>
         <p>Deze bestelling heeft de status: {{ $bestelling[0]['status'] }}</p>
        </div>

        <div class="row col-md-12">
		 <h2>Verzendgegevens</h2>
		 <div class="col-md-3 row">
          <p>Naam:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{ $bestelling[0]['verzend_naam'] }}</p>
        </div>

        <div class="col-md-3 row">
          <p>Adres:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{ $bestelling[0]['adres'] }} @if(!empty($bestelling[0]['bus']))-- {{$bestelling[0]['bus']}}</p>@endif
          <p>{{$bestelling[0]['postcode']}} {{$bestelling[0]['gemeente']}}</p>
          <p>{{ $bestelling[0]['land'] }}</p>
        </div>

        <div class="col-md-3 row">
          <p>E-mailadres:</p>
        </div>

        <div class="col-md-9 row">
          <p>{{ $bestelling[0]['email'] }}</p>
        </div>

        <div class="col-md-3 row">
          <p>Telefoon:</p>
        </div>

        <div class="col-md-9 row">
          <p>@if (!empty($bestelling[0]['telefoon'])) {{ $bestelling[0]['telefoon'] }} @else Geen telefoonnummer @endif</p>
        </div>
		</div>
</div>
     	@endif
@stop