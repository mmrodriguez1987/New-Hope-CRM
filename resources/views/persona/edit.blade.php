@extends('backend.layouts.app')

@section('contentheader_title')
Slideshow | Edit
@endsection


@section('contentheader_description')
Edit a Slide for the main Slideshow
@endsection


@section('htmlheader_title')
Edit Slideshow
@endsection

@section('main-content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			Edit Slide
			<a href="{{ route('slides.index') }}" class="btn btn-default pull-right">Back</a>
		</h2>
		<hr>
		@include('backend.layouts.errors')
		{!! Form::model($slide, ['route' => ['slides.update', 'files' => true, $slide->id], 'method' => 'PUT']) !!}
			@include('backend.slideshow.partial.form')
		{!! Form::close() !!}
	</div>
	<div class="col-xs-12 col-sm-4">
		@include('backend.slideshow.partial.aside')
	</div>
@endsection
