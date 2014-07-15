{{Form::open(array('route' => 'auth.store'))}}
Email:{{Form::text('email', Input::old('email'))}} <br />
Password: {{Form::password('password')}} <br />
{{Form::submit('Login')}}
{{Form::close()}}