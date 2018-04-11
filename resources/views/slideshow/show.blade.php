@extends('backend.layouts.app')

@section('contentheader_title')
Slideshow | view
@endsection


@section('contentheader_description')
View Slideshow
@endsection


@section('htmlheader_title')
Slideshow
@endsection

@section('main-content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			<strong>{{ $slide->id }}</strong> {{ $slide->name }}
			<a href="{{ route('slides.index') }}" class="btn btn-default pull-right">Back</a>
		</h2>
		<hr>
		<section id="main-slider"class="no-margin">
		    <div id="slideshow" class="carousel slide">
		        <div class="carousel-inner">
		            <div class="item active" style="background-image: url({{ $slide->backgroundimage }})">
		                <div class="container">
		                    <div class="row slide-margin">
		                        <div class="col-sm-{{ $slide->text_col_size }}">
		                            <div class="carousel-content">
		                                <h1 class="animation animated-item-1">{{ $slide->text_h1 }}</h1>
		                                <h2 class="animation animated-item-2">{{ $slide->text_h2 }}</h2>
		                                <a class="btn-slide animation animated-item-3" href="{{ $slide->read_more_link }}">Read More</a>
		                            </div>
		                        </div>

		                        <div class="col-sm-{{ $slide->iconimage_col_size }} hidden-xs animation animated-item-{{ $slide->id }}">
		                            <div class="slider-img">
		                                <img src="{{ $slide->iconimage }}" class="img-responsive">
		                            </div>
		                        </div>
		                    </div>
		                </div>
		            </div>
		        </div>
		    </div>
		</section>

		<a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-primary">
			Edit
		</a>
	</div>
	<div class="col-xs-12 col-sm-4">
		@include('backend.slideshow.partial.aside')
	</div>
@endsection
