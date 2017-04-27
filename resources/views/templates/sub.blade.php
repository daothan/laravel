@extends('templates.master')

@section('title','Sub page')


@section('sidebar')
	@parent
	Use sidebar
@stop

@section('content')
	Here is Sub page
	 
	 <div class="text text-success">
	 	<?php 
	 		$name="<b>Dao Than</b>";
	 	 ?>
	 	 {{$name}}<br>
	 	 {!!$name!!}
	 </div>
	

	<?php $point=5; ?>
	@if($point<=7)
		<div class="text text-danger">
			Average student
		</div>

	@elseif($point>7)
		<div class="text text-info">
			Good student
		</div>
	@endif

	Point is :  {{ isset($point) ?   $point : "No point" }}
	
	</hr>

	{{$point or 'No point'}}

@stop