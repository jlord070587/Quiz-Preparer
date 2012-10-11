<?php

class Quizzes_Controller extends Base_Controller {

	public $restful = true;    

    /**
     * List all quizzes in db
     */
	public function get_index()
    {
        return View::make('quiz.index')
            ->with('quizzes', Quiz::all());
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

    }    

	public function delete_destroy()
    {

    }

}