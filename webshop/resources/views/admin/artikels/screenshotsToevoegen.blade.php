@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-artikels') }}">Artikels</a>>Screenshots: {{ $artikels[0]['naam'] }} toevoegen</p>
    <h1>Admin: Screenshots ({{  $artikels[0]['naam']}} - {{$artikels[0]['console']}} ) toevoegen</h1>
</div>

<div class="col-md-12 row">
    @include('flash::message')
</div>


    {!!  Form::open( ['action' => ['admin\AdminArtikelsController@screenshots_toevoegen', $artikels[0]['id_artikels']], 'enctype' => 'multipart/form-data', 'class' => 'form', 'name' =>'artikel_toevoegen']) !!}
	
    	<label for="screenshot">Cover:</label>
			<input type="file" id="screenshot" name="screenshot"> 
		<input type="submit" name="toevoegen" value="Screenshot toevoegen">

    {!!  Form::close() !!}

@stop

