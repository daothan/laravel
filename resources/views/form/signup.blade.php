@extends('templates.master')

@section('content')


	<form enctype="multipart/form-data" action="{!! route('postsignup') !!}" method="POST" role="form" >

		@if(Session::has('message'))
			<div class="alert alert-info">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong>
					{{ Session::get('message') }}
				</strong>
			</div>
		@endif


		<div class="form-group">
			<label for="">name</label>
			<input type="text"  name="name" class="form-control" id="name" placeholder="Email.." value={{old('name')}}>
			<span style="color:red;">
				@if($errors->has('name'))
					{{$errors->first('name')}}
				@endif
			</span>	
		</div>

		<div class="form-group">
			<label for="">Email</label>
			<input type=""  name="email" class="form-control" id="email" placeholder="Email.." value={{old('email')}}>
			<span style="color:red;">
				@if($errors->has('email'))
					{{$errors->first('email')}}
				@endif
			</span>	
		</div>

		<div class="form-group">
			<label for="">Password</label>
			<input type="password"  name="password" class="form-control" id="password" placeholder="Password.." >
			<span style="color:red;">
				@if($errors->has('password'))
					{{$errors->first('password')}}
				@endif
			</span>	
		</div>
		<div class="form-group">
			<label for="">Confirmed Password</label>
			<input type="password"  name="password_confirmation" class="form-control" id="password" placeholder="Confirmed Password.." >
			<span style="color:red;">
				@if($errors->has('confirmedpassword'))
					{{$errors->first('confirmedpassword')}}
				@endif
			</span>	
		</div>

		<div class="form-group">
			<label class="btn btn-default btn-file ">
        		<input type="file" name="file" class="file-loading"}}>
			</label>

			<span style="color:red;">
				@if($errors -> has('file'))
					{{$errors -> first('file')}}
				@endif
			</span>
        </div>

		<div class="checkbox">
			<label><input type="checkbox">Remember me
			</label>
		</div>

		<div class="form-group">
			<label class="checkbox-inline"><input type="checkbox" value="PHP">PHP</label>
			<label class="checkbox-inline"><input type="checkbox" value="Laravel">Laravel</label>
			<label class="checkbox-inline"><input type="checkbox" value="CSS">CSS</label><br>
		</div>

		<div class="form-group">
			<label class="radio-inline">
				<input type="radio" name="optradio" value="male">Male
			</label>
			<label class="radio-inline">
				<input type="radio" name="optradio" value="female">Female
			</label><br>
		</div>

		<div class="form-group">
	        <select class="form-control" name="category">
	            <option>Countryside</option>
	            	<option value="NA">Nghe An</option>
	            	<option value="HT">Ha Tinh</option>
	            	<option value="H">Hue</option>
	         </select>
        </div>

		<div class="form-group">
			{{csrf_field()}}
        </div>

        <div class="form-group">
			<button type="submit" class="btn btn-primary">Sign up</button>
		</div>
	</form>

	<a href="login"><button class="btn btn-success" >Log in</button></a>

@stop