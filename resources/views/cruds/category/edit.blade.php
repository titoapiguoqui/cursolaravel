@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Category edit</div>
	                <div class="panel-body">
	                	{!! Form::open(['route' => ['admin.category.update', $category], 'method' => 'PUT']) !!}
	                		@component('components.category')
	                			@slot('name', $category->name);
	                			@slot('parameters1', ['placeholder' => 'Category name'])

	                			@slot('description', $category->description);
	                			@slot('parameters2', ['placeholder' => 'Category description']);
	                		@endcomponent

		                	<!-- {!! Field::text('name', $category->name) !!} -->
		                	<!-- {!! Field::text('description', $category->description) !!} -->
		                	{!! Form::submit('Update', ['class' => 'btn btn-success btn-xs']) !!}
		                	{{ link_to_route('admin.category.index', 'CANCEL', [], ['class' => 'btn btn-danger btn-xs']) }}
		                {!! Form::close() !!}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection