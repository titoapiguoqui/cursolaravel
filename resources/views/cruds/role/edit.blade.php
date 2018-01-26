@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Role edit</div>
	                <div class="panel-body">
	                	{!! Form::open(['route' => ['admin.role.update', $role], 'method' => 'PUT']) !!}
	                		@component('components.role')
	                			@slot('name', $role->name);
	                			@slot('parameters1', ['placeholder' => 'role name'])

	                			@slot('description', $role->description);
	                			@slot('parameters2', ['placeholder' => 'role description']);
	                		@endcomponent

		                	<!-- {!! Field::text('name', $role->name) !!} -->
		                	<!-- {!! Field::text('description', $role->description) !!} -->
		                	{!! Form::submit('Update', ['class' => 'btn btn-success btn-xs']) !!}
		                	{{ link_to_route('admin.role.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-xs']) }}
		                {!! Form::close() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection