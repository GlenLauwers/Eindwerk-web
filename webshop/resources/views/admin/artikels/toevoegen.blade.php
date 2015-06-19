@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>><a href="{{ asset('/admin-artikels') }}">Artikels</a>>Artikel toevoegen</p>
    <h1>Admin: Artikels toevoegen</h1>
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

	
    {!!  Form::open(array('url' => 'admin-artikels/toevoegen', 'class' => 'form', 'name' =>'artikel_toevoegen', 'enctype' => 'multipart/form-data')) !!}
	
		<div class="col-md-6">
<label for="naam">Naam*:</label>
	<input type="text" id="naam" name="naam"> 

<label for="prijs">Prijs:</label>
	<input type="text" id="prijs" name="prijs"> 

	<label for="release_datum">Release datum:</label>
	<input type="date" id="release_datum" name="release_datum"> 

<label for="trailer">Trailer:</label>
	<input type="text" id="trailer" name="trailer"> 
</div>

<div class="col-md-6">
	<label for="genre">Genre:</label>
	<select name="genre">
		<option value="0">Selecteer een genre</option>
		@foreach ($genres as $genre)
			<option value="{{ $genre->id_genres }} ">{{ $genre->genres }}</option>
		@endforeach
	</select>

	<label for="console">Console:</label>
	<select name="console">
		<option value="0">Selecteer een console</option>
		@foreach ($consoles as $console)
			<option value="{{ $console->id_consoles }} ">{{ $console->console }}</option>
		@endforeach
	</select>

<label for="ontwikkelaar">Ontwikkelaars:</label>
	<select name="ontwikkelaar">
		<option value="0">Selecteer een ontwikkelaar</option>
		@foreach ($ontwikkelaars as $ontwikkelaar)
			<option value="{{ $ontwikkelaar->id_ontwikkelaars }} ">{{ $ontwikkelaar->ontwikkelaars }}</option>
		@endforeach
	</select>

<label for="cover">Cover:</label>
	<input type="file" id="cover" name="cover" enctype="multipart/form-data"> 

<label for="aantal">Aantal:</label>
	<input type="text" id="cover" name="aantal"> 

</div>

<div class="col-md-12">
	<label for="beschrijving">Beschrijving*:</label>
	<textarea rows="8" cols="50" name="beschrijving" ></textarea>
<p>De velden met een * zijn verplicht.</p>
<input type="submit" name="toevoegen" value="Artikel toevoegen">
</div>


	{!!  Form::close() !!}
@stop