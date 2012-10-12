@layout('layout')

@section('container')

<h1>
	All Quizzes 
	<small>{{HTML::link_to_route('new_quiz', 'Create New')}}</small>
</h1>

<table class="table table-striped table-bordered">
	<thead>
		<tr>
			<th>Course Title</th>
			<th>Instructor</th>
			<th>Question Count</th>
			<th>Average Score</th>
			<th>URL</th>
		</tr>
	</thead>
	<tbody>
		@forelse($quizzes as $quiz)
			<tr>
				<td>{{HTML::link_to_route('questions', $quiz->title, $quiz->slug);}}</td>
				<td>{{$quiz->instructor}}</td>
				<td>{{$quiz->numquestions}}</td>
				<td>{{(int)$quiz->averagescore}}%</td>
				<td>{{HTML::link('http://tutsplus.s3.amazonaws.com/tutspremium/quizzes/index.html?id=' . $quiz->slug, 'Link')}}</td>
			</tr>
		@empty
			<tr>
				<td>There are currently no quizzes in the database.</td>
				<td>N/A</td>
				<td>N/A</td>
				<td>N/A</td>
			</tr>
		@endforelse
	</tbody>
</table>

@endsection