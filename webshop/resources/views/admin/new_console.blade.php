@extends('admin')

@section('content')
	<h1>Nieuwe console toevoegen</h1>

	{!!  Form::open(['url' => 'admin-consoles']) !!}
		@include('admin.form_consoles', ['submitButtonText' => 'Toevoegen'])
	{!!  Form::close() !!}
@stop