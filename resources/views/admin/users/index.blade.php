@extends('layouts/admin')

@section('content')
	<h1>Users</h1>

	
	<table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Role</th>
        <th>Active</th>
        <th>Email</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

    	@foreach($users as $user)
			
			<tr>
				<td>{{ $user->name}}</td>
				<td>{{ $user->role->name}}</td>
				<td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
				<td>{{ $user->email}}</td>
				<td>{{ $user->created_at->diffForHumans()}}</td>
				<td>{{ $user->updated_at->diffForHumans()}}</td>

			</tr>

    	@endforeach





{{-- 
      <tr>
        <td>John</td>
        <td>Doe</td>
        <td>john@example.com</td>
      </tr>
      <tr>
        <td>Mary</td>
        <td>Moe</td>
        <td>mary@example.com</td>
      </tr>
      <tr>
        <td>July</td>
        <td>Dooley</td>
        <td>july@example.com</td>
      </tr>--}}


    </tbody>
  </table>
@endsection

