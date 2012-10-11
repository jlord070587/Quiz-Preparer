@layout('layout')

@section('container')

<h1>
	All Quizzes 
	<small>{{HTML::link_to_route('new_quiz', 'Or Create A New One')}}
	</small>
</h1>

@forelse($quizzes as $quiz)
	<li>
		{{HTML::link_to_route('questions', $quiz->title, $quiz->slug);}}
	</li>
@empty
	There are currently no quizzes in the database.
@endforelse

@endsection