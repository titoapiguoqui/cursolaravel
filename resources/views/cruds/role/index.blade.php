@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Roles list</div>
	                <div class="panel-body">
	                	<div class="row">
	                		<div class="col-md-8">
	                			<a class="btn btn-primary btn-xs" href="{{ route('admin.role.create') }}">CREATE</a>
	                		</div>
	                		<div class="col-md-4">
	                			{!! Form::open(['route' => 'admin.role.index', 'method' => 'GET']) !!}
				                	{!! Form::text('filter', $filter, ['class' => 'form-control', 'placeholder' => 'Search...']) !!}
				                	{!! Form::submit('Search', ['class' => 'btn btn-success btn-xs']) !!}
				                	{{ link_to_route('admin.role.index', 'SEARCH CANCEL', [], ['class' => 'btn btn-danger btn-xs']) }}
				                {!! Form::close() !!}
	                		</div>
	                	</div>

	                	<table class="table">
		                	<thead>
		                		<th>Identifier</th>
		                		<th>Name</th>
		                		<th>Description</th>
		                		<th>Accions</th>
		                	</thead>
		                	<tbody>
		                		@foreach($roles as $role)
		                			<tr>
			                			<td>{{ $role->id }}</td>
			                			<td>{{ $role->name }}</td>
			                			<td>{{ $role->description }}</td>
			                			<td>
			                				{{ link_to_route('admin.role.edit', 'EDT', [$role->id], ['class' => 'btn btn-warning btn-xs']) }}
			                				{{ link_to_route('admin.role.show', 'SEE', [$role->id], ['class' => 'btn btn-primary btn-xs']) }}

			                				{!! Form::open(['route' => ['admin.role.destroy', $role->id], 'method' => 'DELETE']) !!}
							                	{!! Form::submit('DEL', ['class' => 'btn btn-danger btn-xs']) !!}
							                {!! Form::close() !!}
			                			</td>
		                			</tr>
		                		@endforeach
		                	</tbody>
	                	</table>
	                	{!! $roles->render() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection