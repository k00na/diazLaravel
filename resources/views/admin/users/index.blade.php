@extends('layouts/admin')



{{--
@if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}",
            @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
            @endif
        });
    </script>
@endif 
--}}

@section('content')
	<h1>Users</h1>
    @if(Session::has('deleted_user'))

    <p class="bg-danger">{{session('deleted_user')}}</p>
    
    @endif

    @if(Session::has('updated_user'))

        <p class="bg-info">{{session('updated_user')}}</p>
        
    @endif

    @if(Session::has('created_user'))

        <p class="bg-success">{{session('created_user')}}</p>
        
    @endif
	
	<table class="table">
    <thead>
      <tr>
        <th>Firstname</th>
        <th>Photo</th>
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
				<td><a href="{{route('admin.users.edit', $user->id)}}">{{ $user->name}}</a></td>
        <td><img height="50" src="{{$user->photo ? $user->photo->file : 'http://www.sioug.si/images/SIOUG/2016_SIOUG/Java_si_predavatelji/unknown-user.png'}}" alt="" ></td>
        {{--<td>{{ $user->photo ? $user->photo->file : 'no photo'}}</td>--}}
				<td>{{ $user->role_id == 0 ? 'Not Asigned' : $user->role->name}}</td> 
				<td>{{ $user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
				<td>{{ $user->email}}</td>
				<td>{{ $user->created_at->diffForHumans()}}</td>
				<td>{{ $user->updated_at->diffForHumans()}}</td>

			</tr>

    	@endforeach


    </tbody>
  </table>
@endsection

