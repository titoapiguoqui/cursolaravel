@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Category show</div>
	                <div class="panel-body">
	                	@component('components.category')
                			@slot('name', $category->name);
                			@slot('parameters1', ['readonly' => 'readonly'])

                			@slot('description', $category->description);
                			@slot('parameters2', ['readonly' => 'readonly']);
                		@endcomponent
	                	<!-- {!! Field::text('name', $category->name, ['readonly' => 'readonly']) !!} -->
	                	<!-- {!! Field::text('description', $category->description, ['readonly' => 'readonly']) !!} -->
                		{{ link_to_route('admin.category.index', 'BACK', [], ['class' => 'btn btn-danger btn-xs']) }}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection