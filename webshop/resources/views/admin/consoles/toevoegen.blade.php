@extends('admin')

@section('content')

<div class="row col-md-12 titel">
    <p><a href="{{ asset('/admin-home') }}">Admin</a>><a href="{{ asset('/admin-consoles') }}">Consoles</a>>Consoles toevoegen</p>
    <h1>Admin: Consoles toevoegen</h1>
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


    {!!  Form::open(['url' => 'admin-consoles/toevoegen']) !!}
	
		@include('admin.consoles.form', ['submitButtonText' => 'Console toevoegen'])

	{!!  Form::close() !!}
@stop