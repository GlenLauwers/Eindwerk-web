@extends('admin')

@section('content')
	<div class="row col-md-12 titel">
       <h2>Admin: inloggen</h2>
     </div>

     <div class="col-md-12 row">
    @include('flash::message')
</div>

     {!!  Form::open(['url' => 'admin-login']) !!}
     	{!! Form::label('gebruikersnaam', 'Gebruikersnaam:') !!}
			{!! Form::text('gebruikersnaam', null) !!}

		{!! Form::label('wachtwoord', 'Wachtwoord:') !!}
			{!! Form::password('wachtwoord', null) !!}

			{!! Form::submit('Login') !!}
     {!!  Form::close() !!}

     <?php
        echo md5('Wachtwoord');
        uniqid(mt_rand(), true);
     ?>

@stop