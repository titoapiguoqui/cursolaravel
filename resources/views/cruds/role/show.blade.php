@extends('layouts.app')

@section('content')
	<div class="container">
	    <div class="row">
	        <div class="col-md-8 col-md-offset-2">
	            <div class="panel panel-default">
	                <div class="panel-heading">Show role</div>
	                <div class="panel-body">
	                	@component('components.role')
                			@slot('name', $role->name);
                			@slot('parameters1', ['readonly' => 'readonly'])

                			@slot('description', $role->description);
                			@slot('parameters2', ['readonly' => 'readonly']);
                		@endcomponent
	                	<!-- {!! Field::text('name', $role->name, ['readonly' => 'readonly']) !!} -->
	                	<!-- {!! Field::text('description', $role->description, ['readonly' => 'readonly']) !!} -->
                		{{ link_to_route('admin.role.index', 'BACK', [], ['class' => 'btn btn-danger btn-xs']) }}
	                </div>
	            </div>
	        </div>
	    </div>
	</div>
@endsection