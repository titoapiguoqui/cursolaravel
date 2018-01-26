@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Role create</div>
	                <div class="panel-body">
	                	{!! Form::open(['route' => 'admin.role.store']) !!}
	                		@component('components.role')
	                			@slot('name', '');
	                			@slot('parameters1', ['placeholder' => 'role name'])

	                			@slot('description', '');
	                			@slot('parameters2', ['placeholder' => 'role description']);
	                		@endcomponent

		                	<!-- {!! Field::text('name', ['placeholder' => 'role name']) !!} -->
		                	<!-- {!! Field::text('description', ['placeholder' => 'role description']) !!} -->
		                	{!! Form::submit('Save', ['class' => 'btn btn-success btn-xs']) !!}
		                	{{ link_to_route('admin.role.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-xs']) }}
		                {!! Form::close() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection