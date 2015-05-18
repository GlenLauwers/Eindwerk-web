@extends('admin')

@section('content')

	<div class="row col-md-12 titel">
       <h1>Admin: Consoles</h1>
     </div>

    <a href="admin-consoles?toevoegen">Console toevoegen</a>

    <?php if (isset($_GET['toevoegen'])): ?>
        <h2>Console toevoegen:</h2>
        <?php if ($errors->any()): ?>
            <ul class="alert alert-danger">
                <?php foreach ($errors->all() as $error): ?>
                    <li>{{ $error }}</li>
                <?php endforeach ?>
            </ul>
        <?php endif ?>
       {!!  Form::open(['url' => 'admin-consoles?toevoegen']) !!}
           @include('admin.form_consoles', ['submitButtonText' => 'Toevoegen'])
        {!!  Form::close() !!}  
    <?php endif ?>

    <?php if (count($console)): ?>
        <div class="col-md-12 row">
                <table class="col-md-6 ">
                    <thead>
                        <tr>
                            <th>Console-nummer</th>
                            <th>Naam console</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach ($console as $console): ?>
                            <tr>
                                <td>{{ $console->id }}</td>
                                <td>{{ $console->console }}</td>
                                <td>{{ $console->actief }}</td>
                                <td><a href="{{ action('AdminController@edit', [$console->id])}}">Wijzigen</a></td>
                                <td><a href="">Verwijderen</a></td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
        </div>
    <?php endif ?>
@stop