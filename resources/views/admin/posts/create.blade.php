@extends('layouts.admin')

@section('content')

	<h1>Create posts</h1>

	{!! Form::open(['method'=>'POST', 'action'=>'AdminPostsController@store', 'files'=>true]) !!}
		<div class="form-group">
			{!! Form::label('title', 'Title:') !!}
			{!! Form::text('title', null, ['class'=>'form-control']) !!}

		</div>

		<div class="form-group">
			{!! Form::label('category_id', 'Category:') !!}
			{!! Form::select('category_id', [''=>'Categories'] + $categories, null, ['class'=>'form-control']) !!}

		
		</div>

		<div class="form-group">
			{!! Form::label('photo_id', 'Photo:') !!}
			{!! Form::file('photo_id', ['class'=>'form-control']) !!}


		</div>

		<div class="form-group">
			{!! Form::label('body', 'Description:') !!}
			{!! Form::textarea('body', null , ['class'=>'form-control', 'rows'=>7]) !!}
		</div>

	
		<div class="form-group">
			{!! Form::submit('Create Post', ['class'=>'btn btn-primary']) !!}
		</div>


	{!! Form::close() !!}

	<div class="row">
		@include('includes.errors')
	</div>
	

@endsection