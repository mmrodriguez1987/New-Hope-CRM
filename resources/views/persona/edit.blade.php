@extends('backend.layouts.app')

@section('contentheader_title')
Personas | Edit
@endsection

@section('contentheader_description')
Edite los datos de las personas
@endsection

@section('htmlheader_title')
Editar datos de personas de la Membresia
@endsection

@section('main-content')
	<div class="row">
		<div class="box box-primary">
			<div class="col-xs-12 col-sm-8">
				<h2>
					Edit Persona
					<a href="{{ route('personas.index') }}" class="btn btn-default pull-right">Back</a>
				</h2>
				<hr/>
				@include('layouts.errors')
				{!! Form::model($persona, ['route' => ['personas.update', 'files' => true, $persona->id], 'method' => 'PUT']) !!}
				@include('persona.partial.form')
				{!! Form::close() !!}
			</div>
		</div>
		<div class="box box-primary">
			<div class="col-xs-12 col-sm-4">
				@include('persona.partial.aside')
			</div>
		</div>
	</d iv>
@endsection
