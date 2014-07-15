<h1>Users</h1>

@if($users)
	<ul>
		@foreach($users as $user)
			<li>{{$user->real_name}} - {{$user->email}} - 
			{{ Form::open(array('route' => array('users.destroy', $user->id), 'method' => 'delete')) }}
        		<button type="submit" href="{{ URL::route('users.destroy', $user->id) }}" class="btn btn-danger btn-mini">Delete</button>
    		{{ Form::close() }} - 
			<a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Editar</a>
    </li>
		@endforeach
	</ul>
@else
	No existe ningún usuario registrado
@endif

{{ HTML::link('users/create', 'Crear un usuario') }}

{{ HTML::link('logout', 'Cerrar Sesión') }}
