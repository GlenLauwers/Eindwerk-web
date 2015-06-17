@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-genres') }}">Genres</a>>{{ $genres_wijzigen->console }} wijzigen</p>
    <h1>Admin: {{ $genres_wijzigen->console }} wijzigen</h1>
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

   {!!  Form::model($genres_wijzigen, ['action' => ['admin\AdminGenresController@update', $genres_wijzigen->id_genres]]) !!}
	
		@include('admin.genres.form', ['submitButtonText' => 'Console wijzigen'])

	{!!  Form::close() !!}
@stop