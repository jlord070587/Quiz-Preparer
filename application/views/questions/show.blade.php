@layout('layout')

@section('container')
<style>
	form li {
		margin-bottom: 1.5em;
	}

	form label {
		display: inline;
		font-weight: bold;
	}

	li input, li textarea {display: block !important;}

	form li span {
		color: #005580;
		font-style: italic;
	}
	textarea {
		width: 75%;
	}

	.radio { padding-left: 0;}
</style>

{{ Form::open("quizzes/$quiz->slug/questions/$question->id", 'PUT', array('id' => 'new-question-form')) }}
	<fieldset>
		<legend>Update Question</legend>
		<ul>
			<li class="all">
				{{ Form::label('title', 'Title: ') }}
				<span>What is the question?</span>
				{{ Form::textarea('title', $question->title) }}
			</li>

			<li class="begin all">
				{{ Form::label('type', 'Type: ') }}
				<span>What type of question is this? </span><br>	
				{{ Form::select('type', array('--', 'text' => 'Text Entry', 'radio' => 'Multiple Choice', 'boolean' => 'True or False'), $question->type) }}
			</li>

			<li class="all">
				{{ Form::label('description', 'Description: ') }}
				<span>Optional: any additional details that you want to provide?</span>
				{{ Form::textarea('description', $question->description) }}
			</li>

			<li class="text radio answer">
				{{ Form::label('answer', 'Answer: ') }}
				<span>What is the answer to this question?</span>
				{{ Form::text('answer', $question->answer, array('class' => 'input-xxlarge')) }}
			</li>

			<li class="boolean answer">
				{{ Form::label('answer', 'Answer: ') }}
				<span>What is the answer to this question?</span>
				{{ Form::select('answer', array('true' => 'True', 'false' => 'False'), $question->answer)}}
			</li>

			<li class="radio">
				{{ Form::label('choices', 'Choices') }}
				<span>Comma separated list of the choices that you want to provide the user.</span>
				{{ Form::textarea('choices', $question->choices) }}
			</li>

			<li class="text">
				{{ Form::label('accept', 'Accept:') }}
				<span>Dash-separated list of answers that are acceptable. Put each item on its own line.</span>
				{{ Form::textarea('accept', $question->accept) }}
			</li>

			<li class="all">
				{{ Form::label('notes', 'Instructor Notes:') }}
				<span>Will be available to the user, when viewing solutions. Link to related lesson, etc.</span>
				{{ Form::textarea('notes', $question->notes) }}
			</li>

			<li class="all">
				{{ Form::submit('Update Question', array('class' => 'btn btn-success input-xxlarge')) }}
			</li>
		</ul>
		{{ Form::hidden('quizId', $quiz->id) }}
	</fieldset>
{{ Form::close() }}
@endsection


@section('scripts')

<script>
	$('select#type').trigger('change');
</script>



@endsection