@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>>Ontwikkelaars</p>
    <h1>Admin: Ontwikkelaars</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

<div class=" col-md-12 toevoegen">
    <a href="admin-ontwikkelaars/toevoegen">Ontwikkelaars toevoegen</a>
</div>

@if (isset($verwijder))
    <div class="row col-md-12">
        <p>Bent u zeker dat u het genre: {{ $ontwikkelaars_verwijder->ontwikkelaars }} wilt verwijderen?</p>
        <a href="{{ url ('/admin-ontwikkelaars/verwijder', $ontwikkelaars_verwijder->id_ontwikkelaars)}}">Ja</a>
        <a href="{{ url ('/admin-ontwikkelaars') }}">Neen</a>
    </div>
@endif

@if (!count($ontwikkelaars))
    <div class="col-md-12 row">
        <p>Er zijn geen ontwikkelaars gevonden.</p>
    </div>
@endif

@if (count($ontwikkelaars))
    <div>
        <table class="tabel col-md-6">
            <thead>
                <th>Ontwikkelaarsnummer:</th>
                <th>Naam:</th>
            </thead>
    
            <tbody>
                @foreach($ontwikkelaars as $ontwikkelaar)
                    <tr>
                        <td>{{ $ontwikkelaar->id_ontwikkelaars }}</td>
                        <td>{{ $ontwikkelaar->ontwikkelaars }}</td>
                        <td><a href="{{ url('/admin-ontwikkelaars/edit', $ontwikkelaar->id_ontwikkelaars) }}">Wijzigen</a></td>
                        <td><a href="{{ url('/admin-ontwikkelaars/delete', $ontwikkelaar->id_ontwikkelaars) }}">Verwijderen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    
@stop