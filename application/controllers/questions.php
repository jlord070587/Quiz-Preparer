<?php

class Questions_Controller extends Base_Controller {

    public $restful = true;

    public function __construct()
    {
        $this
            ->filter('before', 'auth')
            ->except('json');
    }

    /**
     * Display all questions and add new ones for a quiz
     */
    public function get_index($quizSlug)
    {
        $quiz = Quiz::where_slug($quizSlug)->first();
        $questions = Question::where_quiz_id($quiz->id)->get();

        return View::make('questions.index')
            ->with('quiz', $quiz)
            ->with('questions', $questions);
    }

    /**
     * Add a new question
     */
    public function post_create($quizSlug)
    {
        $form = (object)Input::get();

        // add new question to the questions table
        $newQuestion = Question::create(array(
            'quiz_id' => $form->quizId,
            'title' => $form->title,
            'type'  => $form->type,
            'description' => $form->description,
            'answer' => $form->answer,
            'choices' => $form->choices,
            'accept' => $form->accept,
            'notes' => $form->notes
        ));

        return Redirect::to_route('questions', $quizSlug);
    }

    /**
     * Display form to modify current question
     */
    public function get_show($quizSlug, $questionId)
    {
        $quiz = Quiz::where_slug($quizSlug)->first();
        $question = Question::find($questionId);

        return View::make('questions.show')
            ->with('quiz', $quiz)
            ->with('question', $question);
    }

    public function get_json($quizSlug)
    {
        $quiz = Quiz::where_slug($quizSlug)->first();
        $questions= $quiz->questions()->order_by(DB::raw('RAND()'))->get();

        $json = array(
            'meta' => array(
                'title' => $quiz->title,
                'courseUrl' => $quiz->courseurl,
                'quizUrl' => $quiz->quizurl
            )
        );

        $questions = Helpers::dashSeparatedToArray($questions, array('choices', 'accept'));

        $json['questions'] = eloquent_to_json($questions);

        $response = new Response(json_encode($json));

        $headers = array(
            'Access-Control-Allow-Origin' => '*',
            'Content-Type' => 'application/json'
        );

       return Response::make(json_encode($json), 200, $headers);
    }

    /**
     * Update a single question
     */
    public function put_update($quizSlug, $questionId)
    {
        $form = (object)Input::get();
        $question = Question::find($questionId);

        $question->quiz_id = $form->quizId;
        $question->title = $form->title;
        $question->type  = $form->type;
        $question->description = $form->description;
        $question->answer = $form->answer;
        $question->choices = $form->choices;
        $question->accept = $form->accept;
        $question->notes = $form->notes;

        $question->save();

        return Redirect::to_route('questions', $quizSlug);
    }

    /**
     * Delete a question
     */
    public function delete_destroy($slug, $id)
    {
        Question::find($id)->delete();
        return Redirect::back();
    }

}