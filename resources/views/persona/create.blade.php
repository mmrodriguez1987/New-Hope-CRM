@extends('backend.layouts.app')

@section('contentheader_title')
Slideshow | Create
@endsection


@section('contentheader_description')
Create a Slide for the main Slideshow
@endsection


@section('htmlheader_title')
Slideshow 
@endsection

@section('main-content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			New Slide
			<a href="{{ route('administrator.slide.index') }}" class="btn btn-default pull-right">Back</a>
		</h2>
		<hr>
		@include('backend.layouts.errors')
		{!! Form::open(['route' => 'administrator.slides.store', 'files' => true]) !!}			
			@include('backend.slideshow.partial.form')			
		{!! Form::close() !!}
	</div>
	<div class="col-xs-12 col-sm-4">
		@include('backend.slideshow.partial.aside')
	</div>
@endsection