@extends('backend.layouts.app')

@section('contentheader_title')
Slideshow
@endsection


@section('contentheader_description')
Slide's List for a Main Slideshow
@endsection


@section('htmlheader_title')
Slideshow
@endsection

@section('main-content')
	<div class="col-xs-12 col-sm-8">
		<h2>
			Slideshow's List
			<a href="{{ route('slides.create') }}" class="btn btn-primary pull-right">New</a>
		</h2>
		<hr>
		@include('backend.layouts.partials.info')
		@include('backend.layouts.errors')
		<table class="table table-bordered table-striped dataTable" role="grid">
			<thead>
				<tr role="row">
					<th width="20px">ID</th>
					<th>Image</th>
					<th>Icon Image </th>
					<th>Icon Pst </th>
					<th>Icon Col Size </th>
					<th>Text H1 </th>
					<th>Link </th>
					<th>Col Size</th>
					<th>State </th>
					<th colspan="3">&nbsp;</th>
				</tr>
			</thead>
			<tbody>
				 @foreach($slides as $slide)
					<tr>
						<td>{{ $slide->id }}</td>
						<td>{{ $slide->backgroundimage }}</td>
						<td>{{ $slide->iconimage }}</td>
						<td>{{ $slide->iconimage_position }}</td>
						<td>{{ $slide->iconimage_col_size }}</td>
						<td>{{ $slide->text_h1 }}</td>
						<td>{{ $slide->read_more_link }}</td>
						<td>{{ $slide->text_col_size }}</td>
						<td>{{ $slide->state }}</td>
						<td width="20px">
							<a href="{{ route('slides.show', $slide->id) }}" class="btn btn-link">View</a>
						</td>
						<td width="20px">
							<a href="{{ route('slides.edit', $slide->id) }}" class="btn btn-link">Edit</a>
						</td>
						<td width="20px">
							{!! Form::open(['route' => ['slides.destroy', $slide->id], 'method' => 'DELETE']) !!}
								<button class="btn btn-link">Delete</button>
							{!! Form::close() !!}
						</td>
					</tr>
					@endforeach

			</tbody>
		</table>
		{!! $slides->render() !!}
	</div>
	<div class="col-xs-12 col-sm-4">
		@include('backend.slideshow.partial.aside')
	</div>
@endsection
