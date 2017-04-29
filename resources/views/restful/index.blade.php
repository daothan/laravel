@extends('templates.master')

@section('content')

<script type="text/javascript">
        function confirmdelete(msg) {
            if (window.confirm(msg)) {
                return true;
            }
            return false;
        }
    </script>

	<div class="container">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h3 class="panel-title">Show data</h3>
			</div>
			<div class="panel-body">
				<table class="table table-bordered">
					<thead>
						<tr>
							<th>ID</th>
							<th>Name</th>
							<th>Email</th>
							<th>Age</th>
							<th>&nbsp&nbsp Delete</th>
							<th>&nbsp&nbsp Edit</th>
						</tr>
					</thead>
					<tbody>
					@foreach($data as $account)
						<tr>
							<th scope="row">{{$account->id}}</th>
							<td>{{$account->name}}</td>
							<td>{{$account->email}}</td>
							<td>{{$account->age}}</td>
							<th>
			                    <form method="POST" action="{{route('restful.destroy',$account->id)}}" >

			                    	{{csrf_field()}}
			                    	<input type="hidden" name="_method" value="DELETE" >
			                    	<input type="hidden" name="id" value="{{$account->id}}" >

			                    	<button onclick="return confirmdelete('Are you sure you want to delete data ?')" type="submit" id= "delete" class="btn btn-link">Delete </button>
			                    </form>
                			</th>

                			<th>
			                    <a href="{{route('restful.edit',$account->id)}}">
			                    	<button class="btn btn-link">Edit</button>
			                    </a>
                			</th>
            		    </tr>
            		   @endforeach

					</tbody>
				</table>

				<a href="{{route('restful.create')}}">
					<button type="button" class="btn btn-success pull-right">Add Acount</button>
				</a>
			</div>
		</div>
	</div>
@stop
