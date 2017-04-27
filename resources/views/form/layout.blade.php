@extends('templates.master')

@section('content')

<div class="form-group">
{!! Form::open(array('route' => 'data','method'=>'post','files'=>true)) !!}

	{!! Form::label('name','Name') !!}
	{!! Form::text('name','',array('class'=>'form-control','Placeholder'=>'Name...')) !!}<br>


	{!! Form::label('email','Email') !!}
	{!! Form::email('email', '', array('class'=>'form-control','Placeholder'=>'Email...')) !!}<br>

	{!! Form::label('password','Password') !!}
	{!! Form::password('password',array('class'=>'form-control')) !!}<br>

	{!! Form::label('notice','Notice') !!}
	{!! Form::textarea('textarea','',array('class'=>'form-control','row'=>'5')) !!}<br>


	{!! Form::label('gender','Gender')!!}
	{!! Form::radio('Gender', 'male',true) !!}Male
	{!! Form::radio('Gender', 'female') !!}Female<br>


	{!! Form::label('dropdown','Countryside')!!}
	{!! Form::select('size', array('class'=>'dropdown-menu', 'HN' => 'Ha Noi', 'NA' => 'Nghe An', 'H'=>'Hue', 'DN'=>'Da Nang', 'NT'=>'Nha Trang'),'NA') !!}<br>

	{!! Form::label('remember','Subjects')!!}
	{!! Form::checkbox('remember', 'PHP') !!}PHP
	{!! Form::checkbox('remember', 'CSS') !!}CSS
	{!! Form::checkbox('remember', 'Laravel',true) !!}Laravel
	<br>

	{!! Form::label('avatar','Avatar')!!}
	{!! Form::file('images')!!}<br><br>

	{!! Form::submit('Submit',array('class'=>'btn btn-default'))!!}<br>
	{!! Form::button('Ok',array('class'=>'btn btn-default')) !!}
	{!! Form::reset('Reset',array('class'=>'btn btn-default')) !!}

{!! Form::close() !!}

</div>

@stop
