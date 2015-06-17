@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin') }}">Admin</a>><a href="{{ asset('/admin-consoles') }}">Consoles</a>>{{ $console_wijzigen->console }} wijzigen</p>
    <h1>Admin: {{ $console_wijzigen->console }} wijzigen</h1>
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

   {!!  Form::model($console_wijzigen, ['action' => ['admin\AdminConsolesController@update', $console_wijzigen->id_consoles]]) !!}
	
		@include('admin.consoles.form', ['submitButtonText' => 'Console wijzigen'])

	{!!  Form::close() !!}
@stop