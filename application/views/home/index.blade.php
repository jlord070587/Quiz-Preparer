@layout('layout')

@section('container')
	<h1>Login</h1>

	{{ Form::open('authentication') }}
		<ul>
			<li>
				{{ Form::label('username', 'Username: ') }}
				{{ Form::text('username', Input::old('username')) }}
				{{$errors->first('username', '<span>:message</span>')}}
			</li>

			<li>
				{{ Form::label('password', 'Password: ') }}
				{{ Form::text('password', Input::old('password')) }}
				{{ $errors->first('password', '<span>:message</span>') }}
			</li>

			<li>
				{{ Form::submit('Login', array('class' => 'btn')) }}
			</li>
		</ul>
	{{ Form::close() }}
@endsection