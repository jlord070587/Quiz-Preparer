@layout('layout')

@section('container')

<h1>Create New Quiz</h1>

{{ Form::open('quizzes') }}
	<fieldset>
		<legend>Meta Information</legend>
		<ul>
			<li>
				{{ Form::label('title', 'Title: ') }}
				{{ Form::text('title', '', array('class' => 'input-xxlarge')) }}
			</li>

			<li>
				{{ Form::label('instructor', 'Instructor Name: ') }}
				{{ Form::text('instructor', '', array('class' => 'input-xxlarge')) }}
			</li>

			<li>
				{{ Form::label('courseUrl', 'Course URL: ') }}
				{{ Form::text('courseUrl', '', array('class' => 'input-xxlarge')) }}
			</li>

			<li>
				{{ Form::label('quizUrl', 'Quiz URL: ') }}
				{{ Form::text('quizUrl', '', array('class' => 'input-xxlarge')) }}
			</li>
		</ul>
		
		{{ Form::submit('Create Quiz', array('class' => 'btn btn-success')) }}
	</fieldset>

{{ Form::close() }}

@endsection