@extends('app')

@section('content')
<div class="row col-md-12">
        <p><a href="{{ url('/home') }}">Home</a>><a href="{{ url('/dashboard') }}">Dashboard</a>>Mijn bestellingen</p>
      </div>

      <div class="row col-md-12 titel">
        <h2>Mijn bestellingen</h2>
      </div>
       @if (!count($bestelling))
              <p class="col-md-12 row">U hebt nog geen bestellingen geplaatst.</p>
      @else
 <div class="row col-md-12 mijn_bestellingen">
        <table>
          <tr>
            <th>Ordernummer:</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>

          @foreach ($bestelling as $bestelling)
          <tr>
            <td><a href="{{ url('/bestelling', [$bestelling->id_factuur]) }}">{{ $bestelling->id_factuur }}</a></td>
            <td>{{ $bestelling->datum }}</td>    
            <td>€ {{ $bestelling->prijs }}</td>
            <td>{{ $bestelling->status }}</td>
          </tr>
          @endforeach
        </table>
       </div>
       @endif
@stop