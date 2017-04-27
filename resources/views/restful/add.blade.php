@extends('templates.master')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">

           <div class="panel panel-primary">

              <div class="panel-heading">
                <h3 class="panel-title">Add accounts</h3>
              </div>

             <div class="panel-body">

            @if(Session::has('success'))
            <div class="alert alert-success">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
              <strong>{{Session::get('success')}}</strong>
            </div>
            @endif

                <form action="{{route('restful.store')}}" method="POST" >

                    <div class="form-group {{$errors->has('name') ? 'has-error' : ''}}">
                      <label for="">Add Name</label>
                      <input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="Name.." autofocus>
                      @if($errors->has('name'))
                        <span class="help-block">
                          <strong>{{$errors->first('name')}}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group {{$errors->has('email') ? 'has-error' : ''}}">
                      <label for="">Add Email</label>
                      <input type="text" name="email" class="form-control" value="{{old('email')}}" placeholder="Email..">
                      @if($errors->has('email'))
                        <span class="help-block">
                          <strong>{{$errors->first('email')}}</strong>
                        </span>
                      @endif
                    </div>

                    <div class="form-group {{$errors->has('age') ? 'has-error' : ''}}">
                      <label for="">Add Age</label>
                      <input type="text" name="age" class="form-control" value="{{old('age')}}" placeholder="Age..">
                      @if($errors->has('age'))
                      <span class="help-block">
                        <strong>{{$errors->first('age')}}</strong>
                      </span>
                      @endif
                    </div>

                    {{csrf_field()}}
                    <div class="form-group">
                      <button type="submit" class="btn btn-success">Add</button>
                    </div>
                </form>

                <a href="{{route('restful.index')}}">
                  <button type="button" class="btn btn-warning pull-right">Show Accounts</button>
                </a>

              </div>
         </div>
      </div>
  </div>


@stop
