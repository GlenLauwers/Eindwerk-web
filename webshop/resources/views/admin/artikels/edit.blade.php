@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-artikels') }}">Artikels</a>>{{ $artikel_wijzigen->naam }} wijzigen</p>
    <h1>Admin: {{ $artikel_wijzigen->naam }} wijzigen</h1>
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

   {!!  Form::model($artikel_wijzigen, ['action' => ['admin\AdminArtikelsController@update', $artikel_wijzigen->id_artikels], 'enctype' => 'multipart/form-data', 'class' => 'form', 'name' =>'artikel_wijzigen']) !!}
	
		<div class="col-md-6">
<label for="naam">Naam*:</label>
	<input type="text" id="naam" name="naam" value="{{ $artikel_wijzigen->naam }}"> 

<label for="prijs">Prijs:</label>
	<input type="text" id="prijs" name="prijs" value="{{ $artikel_wijzigen->prijs }}"> 

	<label for="release_datum">Release datum:</label>
	<input type="date" id="release_datum" name="release_datum" value="{{ $artikel_wijzigen->release_datum }}"> 


<label for="trailer">Trailer:</label>
	<input type="text" id="trailer" name="trailer" value="{{ $artikel_wijzigen->trailer }}"> 
 
</div>

<div class="col-md-6">
	<label for="genre">Genre:</label>
	<select name="genre">
		<option value="0">Selecteer een genre</option>
		@foreach ($genres as $genre)
			<option value="{{ $genre->id_genres }}" 
				<?php if ($genre->id_genres === $artikel_wijzigen->id_genres): ?>
					selected
				<?php endif ?>>
			{{ $genre->genres }}</option>
		@endforeach
	</select>

	<label for="console">Console:</label>
	<select name="console">
		<option value="0">Selecteer een console</option>
		@foreach ($consoles as $console)
			<option value="{{ $console->id_consoles }}" 
				<?php if ($console->id_consoles === $artikel_wijzigen->id_consoles): ?>
					selected
				<?php endif ?>>
			{{ $console->console }}</option>
		@endforeach
	</select>

<label for="ontwikkelaar">Ontwikkelaars:</label>
	<select name="ontwikkelaar">
		<option value="0">Selecteer een ontwikkelaar</option>
		@foreach ($ontwikkelaars as $ontwikkelaar)
			<option value="{{ $ontwikkelaar->id_ontwikkelaars }}" 
				<?php if ($ontwikkelaar->id_ontwikkelaars === $artikel_wijzigen->id_ontwikkelaars): ?>
					selected
				<?php endif ?>>
			{{ $ontwikkelaar->ontwikkelaars }}</option>
		@endforeach
	</select>

<label for="cover">Cover:</label>
	<input type="file" id="cover" name="cover"> 

<label for="aantal">Aantal:</label>
	<input type="text" id="cover" name="aantal" value="{{ $artikel_wijzigen->aantal }}"> 


</div>

<div class="col-md-12">
	<label for="beschrijving">Beschrijving*:</label>
	<textarea rows="8" cols="50" name="beschrijving">{{ $artikel_wijzigen->beschrijving }}</textarea>
<p>De velden met een * zijn verplicht.</p>
<input type="submit" name="toevoegen" value="Artikel wijzigen">
</div>


	{!!  Form::close() !!}
@stop