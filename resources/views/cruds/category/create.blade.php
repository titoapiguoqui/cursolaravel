@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Category create</div>
	                <div class="panel-body">
	                	{!! Form::open(['route' => 'admin.category.store']) !!}
	                		@component('components.category')
	                			@slot('name', '');
	                			@slot('parameters1', ['placeholder' => 'Category name'])

	                			@slot('description', '');
	                			@slot('parameters2', ['placeholder' => 'Category description']);
	                		@endcomponent

		                	<!-- {!! Field::text('name', ['placeholder' => 'Category name']) !!} -->
		                	<!-- {!! Field::text('description', ['placeholder' => 'Category description']) !!} -->
		                	{!! Form::submit('Save', ['class' => 'btn btn-success btn-xs']) !!}
		                	{{ link_to_route('admin.category.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-xs']) }}
		                {!! Form::close() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection