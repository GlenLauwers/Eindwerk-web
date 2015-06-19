@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>>Consoles</p>
    <h1>Admin: Consoles</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

<div class=" col-md-12 toevoegen">
    <a href="admin-consoles/toevoegen">Console toevoegen</a>
</div>

@if (isset($verwijder))
    <div class="row col-md-12">
        <p>Bent u zeker dat u de console: {{ $console_verwijder->console }} wilt verwijderen?</p>
        <a href="{{ url ('/admin-consoles/verwijder', $console_verwijder->id_consoles)}}">Ja</a>
        <a href="{{ url ('/admin-consoles') }}">Neen</a>
    </div>
@endif

@if (!count($consoles))
    <div class="col-md-12 row">
        <p>Er zijn geen consoles gevonden.</p>
    </div>
@endif

@if (count($consoles))
    <div>
        <table class="tabel col-md-6">
            <thead>
                <th>Consolenummer:</th>
                <th>Naam:</th>
            </thead>
    
            <tbody>
                @foreach($consoles as $console)
                    <tr>
                        <td>{{ $console->id_consoles }}</td>
                        <td>{{ $console->console }}</td>
                        <td><a href="{{ url('/admin-consoles/edit', $console->id_consoles) }}">Wijzigen</a></td>
                        <td><a href="{{ url('/admin-consoles/delete', $console->id_consoles) }}">Verwijderen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    
@stop