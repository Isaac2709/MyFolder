<h1>Editar un usuario</h1>

{{ Form::model($user, array('route' => array('users.update', $user->id), 'method' => 'PUT')) }}
	Real Name: {{ Form::text('real_name', $user->real_name) }}<br />
	Email: {{ Form::text('email', $user->email) }} <br />
	Change Password: {{ Form::password('password') }} <br />
	{{ Form::submit('Actualizar') }}
{{ Form::close() }}
