{{ csrf_field() }}

<div class="form-group">
	{!! Form::label('nombre', 'Nombre') !!}
	{!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('apellido', 'Apellido') !!}
	{!! Form::text('apellido', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('estadocivil', 'Estado Civil') !!}
	{!! Form::select('estadocivil', ['soltero' => 'Soltero', 'casado' => 'Casado', 'viudo' => 'Viudo','separado' => 'separado','ajuntado' => 'ajuntado','divorciado' => 'divorciado']) !!}
</div>

<div class="form-group">
	{!! Form::label('fecha_nac', 'Fecha de Nacimiento') !!}
	{!! Form::date('fechanac',  \Carbon\Carbon::now() , ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('sexo', 'Sexo') !!}
	{!! Form::select('sexo', ['M' => 'Masculino', 'F' => 'Femenino', 'O' => 'Otro']) !!}
</div>

<div class="form-group">
	{!! Form::label('direccion', 'Dirección:') !!}
	{!! Form::text('direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('direccion2', 'Street:') !!}
	{!! Form::text('direccion2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('zipcode', 'ZIP Code:') !!}
	{!! Form::text('zipcode', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('email', 'E-mail:') !!}
	{!! Form::email('email', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cntct_emerg_nombre', 'Contacto Emergencia Nombre: ') !!}
	{!! Form::text('cntct_emerg_nombre', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cntct_emerg_numero', 'Contacto Emergencia Numero: ') !!}
	{!! Form::text('cntct_emerg_numero', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cntct_emerg_direccion', 'Contacto Emergencia Direccion: ') !!}
	{!! Form::text('cntct_emerg_direccion', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('empleador_actual', 'Nombre Empleador Actual: ') !!}
	{!! Form::text('empleador_actual', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('empleador_actual_dir', 'Dirección Empleador Actual: ') !!}
	{!! Form::text('empleador_actual_dir', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('cargo', 'Cargo:') !!}
	{!! Form::select('cargo', $cargos, $cargo_selected,  ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('tipopersona', 'Sexo') !!}
	{!! Form::select('tipopersona', $tipopersonas, $tipopersona_selected,  ['class' => 'form-control']) !!}
</div>

<div class="box-footer">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
	<a href="{{ route('personas.index') }}" class="btn btn-default pull-left">Regresar</a>
</div>
