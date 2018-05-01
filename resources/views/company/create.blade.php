@extends('layout')

@section('content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			Nuevo producto
			<a href="{{ route('persona.index') }}" class="btn btn-default pull-right">		Regresar
			</a>
		</h2>
		<hr>
		@include('persona.partials.errors')
		{!! Form::open(['route' => 'persona.store']) !!}

			@include('persona.partials.form')

		{!! Form::close() !!}
	</div>
	<div class="col-xs-12 col-sm-4">
		@include('persona.partials.aside')
	</div>
@endsection
