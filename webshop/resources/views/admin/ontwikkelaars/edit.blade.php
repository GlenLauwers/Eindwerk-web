@extends('admin')

@section('content')

<div class="row col-md-12 titel">
	<p><a href="{{ asset('/admin-home') }}">Admin</a>><a href="{{ asset('/admin-ontwikkelaars') }}">Ontwikkelaars</a>>{{ $ontwikkelaars_wijzigen->ontwikkelaars }} wijzigen</p>
    <h1>Admin: {{ $ontwikkelaars_wijzigen->ontwikkelaars }} wijzigen</h1>
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

   {!!  Form::model($ontwikkelaars_wijzigen, ['action' => ['admin\AdminOntwikkelaarsController@update', $ontwikkelaars_wijzigen->id_ontwikkelaars]]) !!}
	
		@include('admin.ontwikkelaars.form', ['submitButtonText' => 'Ontwikkelaar wijzigen'])

	{!!  Form::close() !!}
@stop