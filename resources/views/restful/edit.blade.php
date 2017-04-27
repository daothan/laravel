@extends('templates.master')

@section('content')

	<div class="container">
    	<div class="row">
      	  <div class="col-md-8 col-md-offset-2">
				<div class="panel panel-primary">
					<div class="panel-heading">
						<h3 class="panel-title">Edit accounts</h3>
					</div>
					<div class="panel-body">
						<form action="{{route('restful.update',$data['id'])}}" method="POST" >

							<input type="hidden" name="_method" value="PUT">
							{{csrf_field()}}
							<input type="hidden" name="id" value="{{$data['id']}}">

							<div class="form-group {{$errors->has('name') ? 'has-error' : null}}">
								<label for="">Edit Name</label>
								<input type="text" name="name" class="form-control" value="{{old('name',isset($data) ? $data['name'] : null)}}">
								@if($errors->has('name'))
			                        <span class="help-block">
			                          <strong>{{$errors->first('name')}}</strong>
			                        </span>
			                      @endif
							</div>

							<div class="form-group {{$errors->has('email') ? 'has-error' : null}}">
								<label for="">Edit Email</label>
								<input type="text" name="email" class="form-control" value={{old('email', isset($data) ? $data['email'] : null)}}>
								@if($errors->has('email'))
									<span class="help-block">
										<strong>{{$errors->first('email')}}</strong>
									</span>
								@endif
							</div>

							<div class="form-group">
								<label for="">Edit Age</label>
								<input type="text" name="age" class="form-control" value={{old('age', isset($data) ? $data['age'] : null)}}>
								@if($errors->has('age'))
									<span class="help-block">
										<strong>{{$errors->first('age')}}</strong>
									</span>
								@endif
							</div>

							<button type="submit" class="btn btn-success">Edit</button>
						</form>

						<a href="{{route('restful.index')}}">
		                  <button type="button" class="btn btn-warning pull-right">Show Accounts</button>
		                </a>

					</div>
				</div>
			</div>
		</div>
	</div>

@stop
