@extends('templates.master')

@section('title','Loop page')

@section('sidebar')
	@parent
	"Loop page"
@stop

@section('content')
	
	Value:

	@for($i=0; $i<=10; $i++)
		 {!!$i!!}
	@endfor

	<?php $i=1; ?>
	Repeat 
	@while($i<=10)
		<?php $i++; ?>
	@endwhile
		{!!$i!!}
		times
	
	<?php $array=['a','b','c'] ?>
	@foreach($array as $user)
		<div class="text text-info">
			{{$user}}
		</div>
	@endforeach



@stop