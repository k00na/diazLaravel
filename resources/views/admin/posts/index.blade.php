@extends('layouts.admin')

@section('content')

	<h1>Posts</h1>

	<table class="table">
		<thead>
		{{----}}
			<tr>
				<th>Id</th>
				<th>Username</th>
				<th>Title</th>
				<th>Category</th>
				<th>Content</th>
				<th>Photo</th>
				<th>Created at</th>
				<th>Updated at</th>
			</tr>

		</thead>

		<tbody>
			@if($posts)

				@foreach($posts as $post) 
					<tr>
						<td>{{$post->id}}</td>
						<td>{{$post->user->name}}</td>
						<td>{{ substr($post->title, 0, 35)}}</td>
						<td>{{$post->category ? $post->category->name : 'no category'}}</td>
						<td>{{ substr($post->body, 0, 60)}}</td>
						<td><img height="30" src="{{ $post->photo_id ? $post->photo->file : 'https://upload.wikimedia.org/wikipedia/commons/thumb/a/ac/No_image_available.svg/600px-No_image_available.svg.png' }}"></td>
						<td>{{ $post->created_at->diffForHumans()}}</td>
						<td>{{ $post->updated_at->diffForHumans()}}</td>
						

					</tr>
				@endforeach
				
			@endif

		</tbody>


	</table>

@endsection