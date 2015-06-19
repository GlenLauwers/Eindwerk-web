@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>>Artikels</p>
    <h1>Admin: Artikels</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

<div class=" col-md-12 toevoegen">
    <a href="admin-artikels/toevoegen">Artikels toevoegen</a>
</div>

@if (isset($verwijder))
    <div class="row col-md-12">
        <p>Bent u zeker dat u het artikel: <b>{{ $Artikels_verwijder->naam }}</b> wilt verwijderen?</p>
        <a href="{{ url ('/admin-artikels/verwijder', $Artikels_verwijder->id_artikels)}}">Ja</a>
        <a href="{{ url ('/admin-artikels') }}">Neen</a>
    </div>
@endif

{!!  Form::open( ['action' => ['admin\AdminArtikelsController@filter' ],  'name' =>'filter']) !!}
            <label for="zoeken">Zoek uw game:</label>
                <input type="text" name="zoeken">

            <input type="submit" value="zoeken">
{!!  Form::close() !!}

@if (isset($artikel_zoeken))
<p><a href="{{ url ('admin-artikels')}}">Toon alle games</a></p>
@endif

@if (!count($artikels))
    <div class="col-md-12 row">
        <p>Er werden geen games gevonden.</p>
    </div>
@endif


@if (count($artikels))
    <div>
        <table class="tabel col-md-12">
            <thead>
                <th>Artikelnummer:</th>
                <th>Cover:</th>
                <th>Naam:</th>
                <th>Console:</th>
                <th>Prijs:</th>
                <th>Aantal:</th>
            </thead>
    
            <tbody>
                @foreach($artikels as $artikel)
                    <tr >
                        <td>{{ $artikel->id_artikels}}</td>
                        <td>@if(!empty($artikel->cover))<img src=" {{asset('/afbeeldingen')}}/{{ $artikel->cover }}" class="cover_admin"> @else Geen cover gevonden @endif</td>
                        <td><a href="{{ action('admin\AdminArtikelsController@show', [$artikel->id_artikels]) }}">{{ $artikel->naam }}</a></td>                      
                        <td>{{ $artikel->console }}</td>         
                        <td>€ {{ $artikel->prijs }}</td>
                        <td <?php if ($artikel->aantal < 1): ?>
                            class="niet_verkrijgbaar"
                        <?php endif ?><?php if ($artikel->aantal < 20): ?>
                            class="weinig_verkrijgbaar"
                        <?php endif ?><?php if ($artikel->aantal >20): ?>
                            class="veel_verkrijgbaar"
                        <?php endif ?>>{{ $artikel->aantal }}</td>
                        <td><a href="{{ url('/admin-artikels/screenshots', $artikel->id_artikels) }}">Screenshots</a></td>
                        <td><a href="{{ url('/admin-artikels/edit', $artikel->id_artikels) }}">Wijzigen</a></td>
                        <td><a href="{{ url('/admin-artikels/delete', $artikel->id_artikels) }}">Verwijderen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
    
@stop