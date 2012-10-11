@layout('layout')

@section('container')

<h1>{{$quiz->title}} <span>{{HTML::link_to_route('quizzes', 'All Quizzes')}}</span></h1>
<!-- display existing questions -->
@forelse($questions as $question)
	<ul>
		<li>
			{{ HTML::link_to_route('question', $question->title, array($quiz->slug, $question->id)) }}
			{{ Form::open("quizzes/$quiz->slug/questions/$question->id", "DELETE")}}
				{{ Form::submit('Delete') }}
			{{ Form::close()}}
		</li>
	</ul>
@empty
	There aren't any questions assigned to this quiz currently.
@endforelse


<h2>Add Question to This Quiz</h2>

<style>
	form li {
		margin-bottom: 1.5em;
	}
	li input, li textarea {display: block;}
	form li span {
		color: red;
		font-style: italic;
	}
</style>

{{ Form::open("quizzes/$quiz->slug/questions", 'POST', array('id' => 'new-question-form')) }}
	<fieldset>
		<legend>New Question</legend>
		<ul>
			<li class="all">
				{{ Form::label('title', 'Title: ') }}
				<span>What is the question?</span>
				{{ Form::textarea('title') }}
			</li>

			<li class="begin all">
				{{ Form::label('type', 'Type: ') }}
				<span>What type of question is this? </span><br>	
				{{ Form::select('type', array('--', 'text' => 'Text Entry', 'radio' => 'Multiple Choice', 'boolean' => 'True or False')) }}
			</li>

			<li class="all">
				{{ Form::label('description', 'Description: ') }}
				<span>Optional: any additional details that you want to provide?</span>
				{{ Form::textarea('description') }}
			</li>

			<li class="text radio">
				{{ Form::label('answer', 'Answer: ') }}
				<span>What is the answer to this question?</span>
				{{ Form::text('answer') }}
			</li>

			<li class="boolean">
				{{ Form::label('answer', 'Answer: ') }}
				<span>What is the answer to this question?</span>
				{{ Form::select('answer', array('true' => 'True', 'false' => 'False'))}}
			</li>

			<li class="radio">
				{{ Form::label('choices', 'Choices') }}
				<span>Dash-separated list of the choices that you want to provide. Put each item on its own line.</span>
				{{ Form::textarea('choices') }}
			</li>

			<li class="text">
				{{ Form::label('accept', 'Accept:') }}
				<span>Dash-separated list of answers that are acceptable. Put each item on its own line.</span>
				{{ Form::textarea('accept') }}
			</li>

			<li class="all">
				{{ Form::label('notes', 'Instructor Notes:') }}
				<span>Will be available to the user, when viewing solutions. Link to related lesson, etc.</span>
				{{ Form::textarea('notes') }}
			</li>

			<li>
				{{ Form::hidden('quizId', $quiz->id) }}
			</li>

			<li class="all">
				{{ Form::submit('Add Question') }}
			</li>
		</ul>
		
		
		
	</fieldset>
{{ Form::close() }}

@endsection


@section('scripts')

<script>
	$('li.begin').nextAll().hide();
</script>

@endsection