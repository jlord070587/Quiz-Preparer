<?php

class Quizzes_Controller extends Base_Controller {

	public $restful = true;    

    /**
     * List all quizzes in db
     */
	public function get_index()
    {
        $quizzes = Quiz::with('questions')->get();

        return View::make('quiz.index')
            ->with('quizzes', $quizzes);
    }    

    /**
     * Create a new quiz
     */
	public function post_create()
    {
        $input = (object)Input::get();

        // validate
        // 
        
        $createdQuiz = Quiz::create(array(
            'title' => $input->title,
            'instructor' => $input->instructor,
            'courseUrl' => $input->courseUrl,
            'quizUrl' => $input->quizUrl,
            'slug' => str_replace(' ', '-', strtolower($input->title))
        ));

        return Redirect::to_route('quizzes');
    }    

    /**
     * View and add questions to this quiz
     */
	public function get_show($id)
    {
        return View::make('quiz.show');
    }    

	public function get_edit()
    {

    }    

	public function get_new()
    {
        return View::make('quiz.new');
    }    

	public function put_update()
    {
        $completedQuiz = (object)Input::get();

        $slug = strtolower(str_replace(' ', '-', $completedQuiz->slug));

        $quiz = Quiz::where_slug($slug)->first();

        Score::create(array(
            'quiz_id' => $quiz->id,
            'score'   => $completedQuiz->score
        ));

        $headers = array(
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json'
        );

       return Response::make('updated quiz with score!', 200, $headers);
        
    }    

	public function delete_destroy()
    {

    }
}