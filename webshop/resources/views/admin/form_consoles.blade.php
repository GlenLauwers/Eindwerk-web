<div class="form-group">
	{!! Form::label('console', 'Console:') !!}
	{!! Form::text('console', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::submit($submitButtonText, ['class' => 'btn btn-primary form-control']) !!}
</div>