@extends('templates.master')
@section('title','View page')

@section('sidebar')
	@parent
	Below Sidebar
@stop

@section('content')
	<div class="container">
		Here is page inherited from master page
	</div>
@stop