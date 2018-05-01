@extends('layouts.app')

@section('contentheader_title')
Personas | Create
@endsection


@section('contentheader_description')
Registrar a una nueva persona en la membresia
@endsection


@section('htmlheader_title')
Membresia Nueva Persona
@endsection

@section('main-content')
	<div class="row">
		<div class="col-xs-12 col-sm-8 col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h2 class="box-title">
						Nueva Persona
						<a href="{{ route('personas.index') }}" class="btn btn-default pull-right">Regresar</a>
					</h2>
				</div>
				<hr>
				@include('layouts.errors')
				{!! Form::open(['route' => 'personas.store', 'files' => true]) !!}
				<div class="box-body">
					@include('persona.partial.form')
				</div>
				{!! Form::close() !!}


			</div>
		</div>
		<div class="col-xs-12 col-sm-4">
			@include('persona.partial.aside')
		</div>
	</div>
@endsection
