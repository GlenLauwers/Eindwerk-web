@extends('admin')

@section('content')
<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>>Bestellingen</p>
    <h1>Admin: Bestellingen</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

    @if (!count($bestelling))
              <p class="col-md-12 row">U hebt nog geen bestellingen geplaatst.</p>
      @else

      @if (count($niet_betaald))
      <h2>Niet betaald</h2>
 <div class="row col-md-12">
        <table class="tabel col-md-12">
          <tr>
            <th>Ordernummer:</th>
            <th>Naam:</th>
            <th>E-mailadres</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>

          @foreach ($niet_betaald as $bestelling)
          <tr>
            <td><a href="{{ url('/admin-bestellingen', [$bestelling->id_factuur]) }}">{{ $bestelling->id_factuur }}</a></td>
            <td>{{ $bestelling->verzend_naam }}</td>   
            <td>{{ $bestelling->email }}</td>   
            <td>{{ $bestelling->datum }}</td>    
            <td>€ {{ $bestelling->prijs }}</td>
            <td>{{ $bestelling->status }}</td>
            <td><a href="{{ url('/admin-bestellingen/betaald', $bestelling->id_factuur) }}">Betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/verzonden', $bestelling->id_factuur) }}">Verzonden</a></td>
            <td><a href="{{ url('/admin-bestellingen/bezorgd', $bestelling->id_factuur) }}">Bezorgd</a></td>
          </tr>
          @endforeach
        </table>
       </div>
       @endif

        @if (count($betaald))
      <h2>Betaald</h2>
 <div class="row col-md-12">
        <table class="tabel col-md-12">
          <tr>
            <th>Ordernummer:</th>
            <th>Naam:</th>
            <th>E-mailadres</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>

          @foreach ($betaald as $bestelling)
          <tr>
            <td><a href="{{ url('/admin-bestellingen', [$bestelling->id_factuur]) }}">{{ $bestelling->id_factuur }}</a></td>
            <td>{{ $bestelling->verzend_naam }}</td>   
            <td>{{ $bestelling->email }}</td>   
            <td>{{ $bestelling->datum }}</td>    
            <td>€ {{ $bestelling->prijs }}</td>
            <td>{{ $bestelling->status }}</td>
            <td><a href="{{ url('/admin-bestellingen/niet_betaald', $bestelling->id_factuur) }}">Niet betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/verzonden', $bestelling->id_factuur) }}">Verzonden</a></td>
            <td><a href="{{ url('/admin-bestellingen/bezorgd', $bestelling->id_factuur) }}">Bezorgd</a></td>
          </tr>
          @endforeach
        </table>
       </div>
       @endif

        @if (count($verzonden))
       <h2>Verzonden</h2>
 <div class="row col-md-12">
        <table class="tabel col-md-12">
          <tr>
            <th>Ordernummer:</th>
            <th>Naam:</th>
            <th>E-mailadres</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>

          @foreach ($verzonden as $bestelling)
          <tr>
            <td><a href="{{ url('/admin-bestellingen', [$bestelling->id_factuur]) }}">{{ $bestelling->id_factuur }}</a></td>
            <td>{{ $bestelling->verzend_naam }}</td>   
            <td>{{ $bestelling->email }}</td>   
            <td>{{ $bestelling->datum }}</td>    
            <td>€ {{ $bestelling->prijs }}</td>
            <td>{{ $bestelling->status }}</td>
            <td><a href="{{ url('/admin-bestellingen/niet_betaald', $bestelling->id_factuur) }}">Niet betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/betaald', $bestelling->id_factuur) }}">Betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/bezorgd', $bestelling->id_factuur) }}">Bezorgd</a></td>
          </tr>
          @endforeach
        </table>
       </div>
       @endif

        @if (count($bezorgd))
       <h2>Bezorgd</h2>
 <div class="row col-md-12">
        <table class="tabel col-md-12">
          <tr>
            <th>Ordernummer:</th>
            <th>Naam:</th>
            <th>E-mailadres</th>
            <th>Datum:</th>   
            <th>Bedrag:</th>
            <th>Status:</th>
          </tr>

          @foreach ($bezorgd as $bestelling)
          <tr>
            <td><a href="{{ url('/admin-bestellingen', [$bestelling->id_factuur]) }}">{{ $bestelling->id_factuur }}</a></td>
            <td>{{ $bestelling->verzend_naam }}</td>   
            <td>{{ $bestelling->email }}</td>   
            <td>{{ $bestelling->datum }}</td>    
            <td>€ {{ $bestelling->prijs }}</td>
            <td>{{ $bestelling->status }}</td>
             <td><a href="{{ url('/admin-bestellingen/niet_betaald', $bestelling->id_factuur) }}">Niet betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/betaald', $bestelling->id_factuur) }}">Betaald</a></td>
            <td><a href="{{ url('/admin-bestellingen/verzonden', $bestelling->id_factuur) }}">Verzonden</a></td>
          </tr>
          @endforeach
        </table>
       </div>
       @endif
      
       @endif
@stop