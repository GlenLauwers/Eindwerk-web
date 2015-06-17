@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Register</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Whoops!</strong> There were some problems with your input.<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					<form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/register') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">

						<div class="form-group">
							<label class="col-md-4 control-label">Naam:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="familienaam" value="{{ old('familienaam') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Voornaam:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="voornaam" value="{{ old('voornaam') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-mailadres</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Wachtwoord:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="wachtwoord">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bevestig wachtwoord:</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="wachtwoord_confirmation">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Adres:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="adres" value="{{ old('adres') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Bus:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="bus" value="{{ old('bus') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Postcode:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="postcode" value="{{ old('postcode') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Gemeente:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="gemeente" value="{{ old('gemeente') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Land:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="land" value="{{ old('land') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Telefoon:</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="telefoon" value="{{ old('telefoon') }}">
							</div>
						</div>



						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Register
								</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
