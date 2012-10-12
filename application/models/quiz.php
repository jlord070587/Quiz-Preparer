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

	public static function withStats()
	{
		return DB::query(
			"SELECT quizzes.title, instructor, slug, count(questions.quiz_id) as numQuestions, CAST(AVG(scores.score) as UNSIGNED) as averageScore
			FROM quizzes
			LEFT JOIN scores ON scores.quiz_id = quizzes.id
			LEFT JOIN questions ON questions.quiz_id = quizzes.id
			GROUP BY quizzes.title");
	}
}