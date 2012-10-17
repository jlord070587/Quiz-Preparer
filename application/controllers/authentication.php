<?php

class Authentication_Controller extends Base_Controller {

	public $restful = true;

	public function post_create()
  {
  	// validate
  	$validationErrors = User::validate(Input::all());

  	if ( $validationErrors !== false ) {
      Input::flash();
  		return Redirect::to_route('login')->with_errors($validationErrors);
  	}

  	// authenticate
  	$credentials = array(
  		'username' => Input::get('username'),
  		'password' => Input::get('password')
  	);

  	if ( Auth::attempt($credentials) ) {
  		return Redirect::to_route('quizzes');
  	} else {
  		return Redirect::to_route('login')
  			->with('flash', 'Your provided credentials were incorrect.');
  	}
  }

}