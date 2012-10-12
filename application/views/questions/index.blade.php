@layout('layout')

@section('container')

<h1>
	{{$quiz->title}}
	<small>{{HTML::link_to_route('quizzes', 'All Quizzes')}}</small>
</h1>

<!-- display existing questions -->
<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Question Title</th>
			<th>Delete?</th>
		</tr>
	</thead>
	<tbody>
		@forelse($questions as $question)
			<tr>
			<td>{{ HTML::link_to_route('question', $question->title, array($quiz->slug, $question->id)) }}</td>
			<td>
				{{ Form::open("quizzes/$quiz->slug/questions/$question->id", "DELETE", array('class' => 'restButton'))}}
					{{ Form::submit('x') }}
				{{ Form::close()}}
			</td>
			</tr>
		@empty
			<tr>
				<td>There aren't any questions assigned to this quiz currently. </td>
				<td>N/A</td>
			</tr>
		@endforelse
	</tbody>
</table>

<hr>
<h2>Add Question</h2>

{{ Form::open("quizzes/$quiz->slug/questions", 'POST', array('id' => 'new-question-form')) }}
	<fieldset>
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
				{{ Form::text('answer', '', array('class' => 'input-xxlarge')) }}
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
				<span>Optional: Dash-separated list of answers that are acceptable. Put each item on its own line.</span>
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
				{{ Form::submit('Add Question', array('class' => 'btn btn-success')) }}
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