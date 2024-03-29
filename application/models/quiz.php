<?php

class Quiz extends Eloquent 
{
	public function questions()
	{
		return $this->has_many('Question');
	}

	public function scores()
	{
		return $this->has_many('Score');
	}

	public static function withQuestionCountAndAverageScore()
	{
		$quizzes = Quiz::left_join('questions', 'questions.quiz_id', '=', 'quizzes.id')
				->group_by('quizzes.id')
				->get(array(
					'quizzes.id',
					'quizzes.title',
					'instructor',
					'slug',
					DB::raw('count(*) as numQuestions')));


		$averageScores = Quiz::left_join('scores', 'scores.quiz_id', '=', 'quizzes.id')
				->group_by('quizzes.id')
				->get(array(
					'quizzes.id',
					DB::raw('CAST(AVG(scores.score) as UNSIGNED) as averageScore'),
					DB::raw('count(scores.id) as takers')
				));

		for($i = 0; $i < count($quizzes); $i++) {
            $quizzes[$i]->score = $averageScores[$i]->averagescore;
            $quizzes[$i]->takers = $averageScores[$i]->takers;
        }

        return $quizzes;
	}

}