@extends('admin')

@section('content')
<div class="row col-md-12 titel">
    <h1>Admin: home</h1>
</div>

     <div class="col-md-12 row">
    @include('flash::message')
</div>

<div class="col-md-12 row">
	<ul>
		<li><a href="{{ url('/admin-consoles') }}">Consoles</a></li>
		<li><a href="{{ url('/admin-genres') }}">Genres</a></li>
		<li><a href="{{ url('/admin-ontwikkelaars') }}">Ontwikkelaars</a></li>
		<li><a href="{{ url('/admin-artikels') }}">Artikels</a></li>
		<li><a href="">Bestellingen</a></li>
	</ul>
</div>


@stop