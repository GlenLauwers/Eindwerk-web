@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>><a href="{{ asset('/admin-ontwikkelaars') }}">Ontwikkelaars</a>>Ontwikkelaar toevoegen</p>
    <h1>Admin: Ontwikkelaars toevoegen</h1>
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


    {!!  Form::open(['url' => 'admin-ontwikkelaars/toevoegen']) !!}
	
		@include('admin.ontwikkelaars.form', ['submitButtonText' => 'Ontwikkelaar toevoegen'])

	{!!  Form::close() !!}
@stop