@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-artikels') }}">Artikels</a>><a href="{{ asset('/admin-artikels') }}/{{ $artikels[0]['id_artikels'] }}">{{ $artikels[0]['naam'] }}</a>>Screenshots</p>
    <h1>Admin: Screenshots ({{  $artikels[0]['naam']}} - {{$artikels[0]['console']}} )</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>

<div class=" col-md-12 toevoegen">
    <a href="{{ url('/admin-artikels/screenshots/toevoegen', $artikels[0]['id_artikels']) }}">Screenshots toevoegen</a>
</div>

@if (isset($verwijder))
    <div class="row col-md-12">
        <p>Bent u zeker dat u de screenshot wilt verwijderen?</p>
        <a href="{{ url ('/admin-artikels/screenshots/verwijder', $screenshots_verwijder->id_screenshots)}}">Ja</a>
        <a href="{{ url ('/admin-artikels/screenshots/') }}/{{ $artikels[0]['id_artikels'] }}">Neen</a>
    </div>
@endif

@if (!count($screenshots))
    <div class="col-md-12 row">
        <p>Er zijn geen screenshots gevonden.</p>
    </div>
@endif

@if (count($screenshots))
    <div>
        <table class="tabel col-md-12">
            <thead>
                <th>Artikelnummer:</th>
                <th>screenshot:</th>
            </thead>
    
            <tbody>
                @foreach($screenshots as $screenshot)
                    <tr>
                        <td>{{ $screenshot->id_screenshots}}</td>
                        <td><img src="{{asset('/afbeeldingen')}}/{{ $screenshot->screenshot}}" alt="Screenshot" class="admin_screenshot"></td>
                        <td><a href="{{ url('/admin-artikels/screenshots/delete', $screenshot->id_screenshots) }}">Verwijderen</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endif
@stop