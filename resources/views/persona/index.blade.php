@extends('layouts.app')

@section('contentheader_title')
Personas
@endsection

@section('contentheader_description')
Base de datos de las personas que pertenecen a la membresia de New Hope
@endsection


@section('htmlheader_title')
New Hope | Personas
@endsection

@section('main-content')
	<div class="row">
		<div class="col-xs-12 col-sm-8">
			<h2>
				Lista de Personas
				<a href="{{ route('personas.create') }}" class="btn btn-primary pull-right">Nueva</a>
			</h2>
			<hr>
			@include('layouts.partials.info')
			@include('layouts.errors')
			<table class="table table-bordered table-striped dataTable" role="grid">
				<thead>
					<tr role="row">
						<th width="20px">ID</th>
						<th>Nombre</th>
						<th>Edad</th>
						<th>Sexo </th>
						<th>Email</th>
						<th colspan="3">&nbsp;</th>
					</tr>
				</thead>
				<tbody>
					 @foreach($personas as $persona)
						<tr>
							<td>{{ $persona->id }}</td>
							<td>{{ $persona->nombre . ' ' . $persona->apellido }}</td>
							<td>{{ Carbon::parse($alumno->fecha_nacimiento)->age}}</td>
							<td>{{ $persona->sexo }}</td>
							<td>{{ $persona->email }}</td>
							<td width="20px">
								<a href="{{ route('persona.show', $persona->id) }}" class="btn btn-link">View</a>
							</td>
							<td width="20px">
								<a href="{{ route('persona.edit', $persona->id) }}" class="btn btn-link">Edit</a>
							</td>
							<td width="20px">
								{!! Form::open(['route' => ['persona.destroy', $persona->id], 'method' => 'DELETE']) !!}
									<button class="btn btn-link">Delete</button>
								{!! Form::close() !!}
							</td>
						</tr>
						@endforeach
				</tbody>
			</table>
			{!! $personas->render() !!}
		</div>
		<div class="col-xs-12 col-sm-4">
			@include('persona.partial.aside')
		</div>
	</div>
@endsection
