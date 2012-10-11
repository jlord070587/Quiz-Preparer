@layout('layout')

@section('container')

<h1>Create New Quiz</h1>

{{ Form::open('quizzes') }}
	<fieldset>
		<legend>Meta</legend>
		<ul>
			<li>
				{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title') }}
			</li>

			<li>
				{{ Form::label('instructor', 'Instructor Name: ') }}
				{{ Form::text('instructor') }}
			</li>

			<li>
				{{ Form::label('courseUrl', 'Course URL: ') }}
				{{ Form::text('courseUrl') }}
			</li>

			<li>
				{{ Form::label('quizUrl', 'Quiz URL: ') }}
				{{ Form::text('quizUrl') }}
			</li>
		</ul>
		
		{{ Form::submit('Create Quiz') }}
	</fieldset>

{{ Form::close() }}

@endsection