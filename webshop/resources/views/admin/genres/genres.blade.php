@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>>Genres</p>
    <h1>Admin: Genres</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

<div class=" col-md-12 toevoegen">
    <a href="admin-genres/toevoegen">Genres toevoegen</a>
</div>

@if (isset($verwijder))
    <div class="row col-md-12">
        <p>Bent u zeker dat u het genre: {{ $genres_verwijder->genres }} wilt verwijderen?</p>
        <a href="{{ url ('/admin-genres/verwijder', $genres_verwijder->id_genres)}}">Ja</a>
        <a href="{{ url ('/admin-genres') }}">Neen</a>
    </div>
@endif

@if (!count($genres))
    <div class="col-md-12 row">
        <p>Er zijn geen genres gevonden.</p>
    </div>
@endif

@if (count($genres))
    <div>
        <table class="tabel col-md-6">
            <thead>
                <th>Genrenummer:</th>
                <th>Naam:</th>
            </thead>
    
            <tbody>
                @foreach($genres as $genre)
                    <tr>
                        <td>{{ $genre->id_genres }}</td>
                        <td>{{ $genre->genres }}</td>
                        <td><a href="{{ url('/admin-genres/edit', $genre->id_genres) }}">Wijzigen</a></td>
                        <td><a href="{{ url('/admin-genres/delete', $genre->id_genres) }}">Verwijderen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif

    
@stop