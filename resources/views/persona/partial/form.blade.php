{{ csrf_field() }}

<div class="form-group">
	{!! Form::label('background_image_file_path', 'Image File') !!}
	{!! Form::file('background_image_file_path', null, ['class' => 'form-control file']) !!}
</div>


<div class="form-group">
	{!! Form::label('iconimage_file_path', 'Icon Image File') !!}
	{!! Form::file('iconimage_file_path', null, ['class' => 'form-control file']) !!}
</div>

<div class="form-group">
	{!! Form::label('iconimage_position', 'Icon Image Position') !!}
	{!! Form::text('iconimage_position', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('iconimage_col_size', 'Icon Image Column Size') !!}
	{!! Form::number('iconimage_col_size', null, ['class' => 'form-control']) !!}
	{!! Form::select('iconimage_col_size', ['1' => '1 Column','2' => '2 Column','3' => '3 Column','4' => '4 Column','5' => '5 Column','6' => '6 Column','7' => '7 Column','8' => '8 Column','9' => '9 Column','10' => '10 Column','11' => '11 Column','12' => '12 Column'], '6') !!}
</div>

<div class="form-group">
	{!! Form::label('text_h1', 'Main Heading') !!}
	{!! Form::text('text_h1', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('text_h2', 'Short Description') !!}
	{!! Form::textarea('text_h2', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('read_more_link', 'Read More Button Link') !!}
	{!! Form::text('read_more_link', null, ['class' => 'form-control']) !!}
</div>

<div class="form-group">
	{!! Form::label('text_col_size', 'Text Column Size') !!}
	{!! Form::select('text_col_size', [	'1' => '1 Column', '2' => '2 Column', '3' => '3 Column','4' => '4 Column', '5' => '5 Column', '6' => '6 Column','7' => '7 Column','8' => '8 Column','9' => '9 Column','10' => '10 Column','11' => '11 Column','12' => '12 Column'], '6') !!}
</div>

<div class="form-group">
	{!! Form::label('state', 'State') !!}
	{!! Form::checkbox('state', null, ['class' => 'form-control', 'value' => 'true']) !!}
</div>

<div class="form-group">
	{!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
</div>
